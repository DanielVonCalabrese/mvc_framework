<h1>Login</h1>

<?
    if(isset($this->errorMessages))
    {
        if(is_array($this->errorMessages))
        {
            foreach($this->errorMessages as $message)
            {
                echo '<div class="redMsg">' . $message . '</div>';
            }
        }
        else
        {
            echo '<div class="redMsg">' . $this->errorMessages . '</div>';
        }
    }
?>
<br />
<?=$this->form?>
