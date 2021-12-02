<?php
/**
 * @var $hash
 * @var $wrapper \Kavalar\Captcha\FigureWraper
 * @var $type
 */

?>
<html>
<head>
</head>
<body>
<img src ="assets/captcha/<?php echo $wrapper->hash ?>.jpg" />
<form  action="/UsersInteraction.php" method = 'post'>
    <br>
    <label>  <?php echo ('Сколько раз изображен  '); echo $wrapper->type ?> ?
        <input type="number" autocomplete="off" name="kol_figures">
        <input name="hash" type="hidden" value="<?php echo $wrapper->hash ?>">
    </label>
    <input type="submit" name="Quantity" value="Отправить">
</form>
</body>
</html>