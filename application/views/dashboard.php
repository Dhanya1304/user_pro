

<div class="container">
    <h2>Welcome to Your Dashboard</h2>
	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						  <a class="dropdown-item" href="<?=base_url()?>index.php/edit_profile">Profile</a>
						  <a href="<?=base_url()?>index.php/Login/logout" class="dropdown-item" href="#">Logout</a>
						</div>
    <div class="mb-4">
        <h3>Add Friend</h3>

        <h2>Users You Can Add as Friends</h2>
<ul>
    <?php foreach ($users as $user): ?>
        <li>
            <span><?php echo $user['name']; ?></span>
            <button class="add-friend" data-user-id="<?php echo $user['id']; ?>">Add Friend</button>
        </li>
    <?php endforeach; ?>
</ul>

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
<script>
    $(document).ready(function() {
        $('.add-friend').click(function() {
            var userId = $(this).data('user-id');
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('dashboard/add_friend'); ?>', 
                data: { userId: userId },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        alert('Friend added successfully!');
                    } else {
                        alert('Failed to add friend.');
                    }
                },
                error: function() {
                    alert('An error occurred while adding a friend.');
                }
            });
        });
    });
</script>