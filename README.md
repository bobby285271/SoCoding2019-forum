# 三代单传大锅

| [项目进展](https://github.com/bobby285271/SoCoding2019-forum/projects/1) | [发布版本](https://github.com/bobby285271/SoCoding2019-forum/releases) | [问题反馈](https://github.com/bobby285271/SoCoding2019-forum/issues) | [参与其中](https://github.com/bobby285271/SoCoding2019-forum/pulls) |
|:---:|:---:|:---:|:---:|

## 项目介绍
一个简易的论坛，有用户注册与登录、查看帖子、新建帖子、修改帖子、回复帖子等功能。前端使用 Bootstrap 框架，后端使用 PHP + MySQL。

## 目录结构
```
├── assets/ # 静态资源存放
	├── css/
	├── images/
	├── js/
├── config/ # 项目配置文件
	├── config.php # 配置文件
├── core/ # 核心组件
	├── mysqlDB.php # 数据库连接文件
├── model/ # 业务
	├── login.php # 用户登录入口
	├── register.php # 用户注册入口
	├── register_deal.php # 注册数据处理
	├── validate.php # 登录数据处理
├── views/ # 视图
    	├── index.html # 主页面
	├── login.html # 用户登录
	├── register.html # 用户注册
├── index.php # 主页面入口
├── init.php # 项目初始化文件
├── README.md # 项目总览文档
```

## 维护者
* 项目负责人：[HZY](https://github.com/Quantum-Revolution)
* 前端（2 人）：[WMY](https://github.com/greatmove)、[FWJ](https://github.com/Feng-Wenjun)
* 后端（3 人）：[RJL](https://github.com/bobby285271)、[HYH](https://github.com/Meta-phy)、[HZY](https://github.com/Quantum-Revolution)
