<?php
\Core\View::render('parts/header.php', ['title' => 'Posts Page']);
if(!empty($posts)): ?>
    <h2 class="text-center mt-5">Posts</h2>
    <table class="table table-dark mt-5" style="margin: 0 auto; max-width: 900px;">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Created date</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <th scope="row"><?php echo $post['id']; ?></th>
                <td><?php echo $post['title']; ?></td>
                <td><?php echo $post['created_at']; ?></td>
                <td>
                    <a href="/posts/<?php echo $post['id']; ?>/edit" class="btn btn-warning">Edit</a>
                    <a href="/posts/<?php echo $post['id']; ?>/delete" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php
else:
    ?>
    <h3 class="mt-5 text-center">There are no posts yet.</h3>
<?php
endif;
\Core\View::render('parts/footer.php');
