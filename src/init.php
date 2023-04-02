<?php
function dbConnect() {
    return new PDO('mysql:host=92.222.10.61;dbname=TasK;charset=utf8', 'root', '123456789');
}