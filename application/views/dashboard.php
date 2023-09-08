

<div class="container">
    <h2>Welcome to Your Dashboard</h2>

    <div class="mb-4">
        <h3>Add Friend</h3>
        <form action="<?php echo base_url('dashboard/addFriend'); ?>" method="POST">
        </form>
    </div>

    <div>
        <h3>Your Friends</h3>
        <ul>
            <!-- Loop through and display the list of friends here -->
            <?php foreach ($friends as $friend) : ?>
                <li><?php echo $friend->name; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
