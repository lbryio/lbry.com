<?php Response::setMetaDescription('YouTuber? Take back control! LBRY allows publication on your terms. It\'s open-source, decentralized, and gives you 100% of the profit.') ?>
<?php Response::setMetaTitle(__('YouTubers! Take back control.')) ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>
<main>

<?php $status = LBRY::statusYoutube($token);
?>
<center>
  LBRY channel name: <?php echo $status['data']['lbry_channel_name'];?>
</center>
<center>
    Youtube Sync status: <?php echo $status['data']['status'];?>

</center>
<center>
    Expected Reward: <?php echo $status['data']['expected_reward'];?>
</center>
<main/>
