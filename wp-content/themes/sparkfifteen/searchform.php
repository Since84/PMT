<?php 
global $sparkForm;
$sparkForm = new SparkForm(array(
  'template'     =>  'searchform' //Name of Form template
));

echo $sparkForm::getView();

?>