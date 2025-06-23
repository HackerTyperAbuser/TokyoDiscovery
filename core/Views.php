<?php 

class Views 
{
    public static function render($viewPath, $data = [])
    {
        extract($data);
        require BASE_PATH . "/app/Views/{$viewPath}.php";
    }
}

?>