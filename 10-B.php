<?php
$minute = $now->format("i");
if ($minute % 2 == 0) {
  $msj = "Me siento raro! 🤢";
} else {
  $msj = "Todo bien! 👍🏻";
}
?>
<h1><?php echo $msj; ?></h1>
