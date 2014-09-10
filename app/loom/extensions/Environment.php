<?php namespace Loom\Extensions;

class Environment extends \Illuminate\View\Environment {
    public function prependSection()
    {
        $last = array_pop($this->sectionStack);
        if (isset($this->sections[$last]))
        {
            $this->sections[$last] = ob_get_clean() . $this->sections[$last];
        }
        else
        {
            $this->sections[$last] = ob_get_clean();
        }

        return $this->sections[$last];
    }
}