<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>簡易掲示板</title>
</head>
<body>
    <article>
        <h1>ぼくのけいじばん</h1>
        <p>
            なにかかきましょう
        </p>
        <?php if (isset($error_msg) === true) :?>
        <p>
            <?php echo $error_msg;?>
        </p>
        <?php endif;?>
        <form action="<?php echo URL . 'api.php';?>" method="POST">
            <input type="text" name="user_name" placeholder="Your name">
            <textarea name="text_body" placeholder="Input your post here..."></textarea>
            <input type="submit" name="send">
        </form>
        <table>
            <thead>
                <tr>
                    <th>
                        名前
                    </th>
                    <th>
                        内容
                    </th>
                    <th>
                        時間
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php for($i = $count - 1; $i >= 0; $i--):?>
                    <tr>
                        <?php foreach($data[$i] as $row_data) :?>
                            <td>
                                <?php echo $row_data;?>
                            </td>
                        <?php endforeach;?>
                    </tr>
                <?php endfor;?>
            </tbody>
        </table>
    </article>
</body>
</html>

