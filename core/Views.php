<?php 

class Views 
{
    public static function render($viewPath, $data = [])
    {
        if (!isset($data['csrf']))
        {
            $data['csrf'] = $_SESSION['csrfToken'];
        }
        extract($data);
        require BASE_PATH . "/app/Views/{$viewPath}.php";
    }
}

?>