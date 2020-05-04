## 评论模块

* 后端目录：`controller/comment`

### 发表评论 `create`
<!-- 对应文件：后端 `controller/commentAction.php`，前端 `view/view-*.html`

用户在「查看某一帖子」页下方输入评论内容 `comment_content`，POST 到 `commentAction.php`，检验数据合理性后，连同 **帖子的** 主键 ID 和发帖人 `user_account` 一并写入数据表 `$forum_bbs`。 -->

### 查看评论 `list`
<!-- 对应文件：后端 `controller/commentListAction.php`，前端 `view/view-*.html`

后端获取 **帖子的** 主键 ID 后取出所有有该 ID 的数据并打印。前后端负责范围同「查看所有帖子」，即后端负责打印 `<li class="list-group-item">user_account：Comment</li>`，其中 `user_account` 为评论人账户，`Comment` 为评论内容。 -->