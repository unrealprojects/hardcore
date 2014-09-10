<?php namespace Loom\Extensions;

class BladeCompiler extends \Illuminate\View\Compilers\BladeCompiler {

    /**
     * Compile the given Blade template contents.
     *
     * @param  string  $value
     * @return string
     */
    public function compileString($value)
    {
        $this->compilers = array_merge($this->compilers, array('Prepend'));
        return parent::compileString($value);
    }

    /**
     * Compile Blade show statements into valid PHP.
     *
     * @param  string  $value
     * @return string
     */
    protected function compilePrepend($value)
    {
        $pattern = $this->createPlainMatcher('prepend');

        return preg_replace($pattern, '$1<?php echo $__env->prependSection(); ?>$2', $value);
    }
}