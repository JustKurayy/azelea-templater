<?php

namespace Azelea\Templater;

use Locale;

class Loom {
    protected $variables = [];
    private $locales;

    public function __construct(array $variables) {
        $this->variables = $variables;
        $this->locales = new Locales();
        $this->locales->chooseLanguage("en");
    }

    public function render(string $template) {
        $dir = substr(dirname(__DIR__), 0, strpos(dirname(__DIR__), "\\vendor\\"));
        $templatePath = $dir . "/src/pages/" . $template;
        if (!file_exists($templatePath)) {
            throw new \Exception("Template file not found: $templatePath");
        }

        extract($this->variables);

        // Load the template file content
        $content = file_get_contents($templatePath);

        // Process the directives in the content
        $content = $this->processDirectives($content);

        // Start output buffering and evaluate the PHP
        ob_start();
        eval('?>' . $content);
        echo ob_get_clean();
    }

    public function processDirectives(string $content): string {
        // Replace @foreach
        $content = preg_replace_callback('/@foreach\s*\(\s*\$(\w+)\s+as\s+\$(\w+)\s*\)/', function ($matches) {
            $array = $matches[1];
            $item = $matches[2];
            return "<?php foreach (\$$array as \$$item): ?>";
        }, $content);

        // Replace @endforeach
        $content = str_replace('@endforeach', '<?php endforeach; ?>', $content);

        // Replace @for
        $content = preg_replace('/@for\s*\(\s*(.+?)\s*\)/', '<?php for ($1): ?>', $content);

        // Replace @endfor
        $content = str_replace('@endfor', '<?php endfor; ?>', $content);

        // Replace @yield
        $content = preg_replace('/@yield\s*\(\s*([^()]+)\s*\)/', '<?php echo $1; ?>', $content);

        // Replace @asset
        $content = preg_replace('/@asset\(\s*\'([^\"]+)\'\s*\)/', '<?php echo "/assets/$1"; ?>', $content);

        // Replace @lang
        $content = preg_replace_callback('/@lang\(\s*\'([^\']+)\'\s*\)/', function ($matches) {
            $key = trim($matches[1]);
            $locales = $this->locales->getLocale($key);
            return "<?php echo '$locales'; ?>"; // Remove quotes around $params to pass as variables
        }, $content);

        // Replace @class
        $content = preg_replace_callback('/@class\(\s*\'?(\w+)\'?\s*\)->(\w+)\s*\(\s*(.+?)\s*\)/', function ($matches) {
            $className = trim($matches[1]);
            $method = trim($matches[2]);
            $params = trim($matches[3]);
            return "<?php echo $$className->$method($params); ?>"; // Remove quotes around $params to pass as variables
        }, $content);

        return $content;
    }
}
