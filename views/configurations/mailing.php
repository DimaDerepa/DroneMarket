
<?php include(ROOT . '/views/layouts/header.php');?>

<div class="admin_contacts">
    <form method="post" action="#">
        
        <span class="config_span">Headline</span>
        <input required name="headline" type="text" placeholder="Headline of message">
        <span  class="config_span">Text</span>
        <textarea required name="text" cols="100" rows="20"></textarea>
        <span  class="config_span">Select recipients</span>
        <select name="recipients">
            <option value="subscribers">Only for subscribers</option>
            <option value="users">Only for users</option>
            <option value="all">Subscribers & users</option>
        </select>
        <input name="submit" type="submit" value="Send mailing">
    </form>

</div>
<?php include(ROOT . '/views/layouts/footer.php');?>