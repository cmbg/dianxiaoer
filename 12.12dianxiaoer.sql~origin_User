/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : dianxiaoer

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-12-12 22:55:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for address
-- ----------------------------
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '表ID',
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '收货人',
  `phone` char(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '电话',
  `address` char(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '地址',
  `isStaAdd` tinyint(5) NOT NULL DEFAULT '2' COMMENT '是否默认地址  2为默认地址',
  `uid` int(11) unsigned NOT NULL COMMENT '前台用户id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of address
-- ----------------------------
INSERT INTO `address` VALUES ('1', '宋寿强', '15704619282', '江西省抚州市资溪县巴拉巴拉', '1', '2');
INSERT INTO `address` VALUES ('3', '宋先生', '15704619282', '福建省南平市松源镇巴拉巴拉', '1', '2');
INSERT INTO `address` VALUES ('4', '王先生', '15704619282', '江苏省盐城市合德镇哔哩哔哩', '1', '2');
INSERT INTO `address` VALUES ('12', '宋先生', '15704619282', '河南省平顶山市鲁山县略略略', '2', '2');
INSERT INTO `address` VALUES ('13', '聂先生', '15704619282', '湖北省省直辖县级行政单位天门市哔哩哔哩', '2', '6');
INSERT INTO `address` VALUES ('16', '哔哩哔哩先生', '15704619282', '江西省南昌市龙津镇哔哩哔哩', '1', '8');
INSERT INTO `address` VALUES ('17', '巴拉巴拉先生', '15704619282', '浙江省湖州市南浔区巴拉巴拉', '1', '8');
INSERT INTO `address` VALUES ('18', '啪啪啪先生', '15704619282', '福建省南平市政和县屁屁屁', '2', '8');
INSERT INTO `address` VALUES ('20', '爱波波先生', '15704619282', '江西省景德镇市昌江区哔哩哔哩', '1', '9');
INSERT INTO `address` VALUES ('21', '吴南', '15704619282', '江西省九江市都昌县三里屯', '1', '9');
INSERT INTO `address` VALUES ('22', '聂先生', '15704619282', '湖北省省直辖县级行政单位天门市聂先生', '2', '9');
INSERT INTO `address` VALUES ('23', 'admin', '15704619282', '福建省南平市政和县123141', '2', '10');
INSERT INTO `address` VALUES ('25', '王先生', '15704619282', '江西省抚州市鹤城镇巴拉巴拉', '2', '1');
INSERT INTO `address` VALUES ('26', '宋寿强', '15704619282', '天津市天津市河东区哔哩哔哩', '1', '1');
INSERT INTO `address` VALUES ('28', '王先生', '15704619282', '山东省泰安市宁阳县巴拉巴拉', '2', '71');

-- ----------------------------
-- Table structure for admin_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uname` char(50) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `tel` varchar(20) NOT NULL COMMENT '电话',
  `email` varchar(30) NOT NULL COMMENT '邮箱',
  `status` int(10) unsigned NOT NULL COMMENT '状态(1,可以使用2,注销)',
  `identity` int(10) unsigned NOT NULL COMMENT '身份(1:超级管理员,2:普通管理员)',
  `sex` varchar(5) NOT NULL COMMENT '性别',
  `avatar` varchar(255) NOT NULL COMMENT '头像',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_users
-- ----------------------------
INSERT INTO `admin_users` VALUES ('1', 'admin', '$2y$10$f7iJm0mkJWwAFffzdk4Q3eCgjKFWwLHRKPedaJcP4KrQE0q/K2V/G', '15704619282', '630350567@qq.com', '0', '1', 'm', '/uploads/151307733313445a2fba550b547.jpg');
INSERT INTO `admin_users` VALUES ('11', 'sssss123', '$2y$10$I4pU7DuCaqqAYGAqNBSY..8x1FExn4jx17UssKURVt0cfy7/Lbjqq', '15704619282', '630350567@qq.com', '0', '1', 'm', '/uploads/151307775146535a2fbbf7358bd.jpg');
INSERT INTO `admin_users` VALUES ('12', 'qqqqq', '$2y$10$VzlSHHov6PUxXbCzsphho..JrVLg3tmjzT3idZyXgO5hgTa2/kqDW', '15704619287', '630350567278@qq.com', '0', '0', 'x', '/uploads/151272511998255a2a5a7f3f0de.jpg');
INSERT INTO `admin_users` VALUES ('14', 'admin', '$2y$10$kcwdUVfP6LoQKXdyp3crruDUTsAZdPbn1FTB6s7S5pvZKSMIz4BMa', '15704619282', '123123123@qq.com', '0', '0', 'w', '/uploads/151272425950145a2a5723860e9.jpg');

-- ----------------------------
-- Table structure for adver
-- ----------------------------
DROP TABLE IF EXISTS `adver`;
CREATE TABLE `adver` (
  `adv_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `acustomer` varchar(255) NOT NULL COMMENT '客户信息',
  `atime` datetime NOT NULL COMMENT '有效时间',
  `atitle` varchar(255) NOT NULL COMMENT '广告标题',
  `apic` varchar(255) NOT NULL COMMENT '图片地址',
  `aurl` varchar(255) NOT NULL COMMENT '跳转地址',
  `astatus` varchar(255) NOT NULL DEFAULT '1' COMMENT '0:投放  1:下刊',
  `posit` tinyint(255) unsigned DEFAULT NULL COMMENT '投放位置',
  PRIMARY KEY (`adv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of adver
-- ----------------------------
INSERT INTO `adver` VALUES ('32', '111', '0000-00-00 00:00:00', '111', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/ad_15125700866926.jpg', '3333', '0', '1');
INSERT INTO `adver` VALUES ('33', '22', '0000-00-00 00:00:00', '6666', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/ad_15127140106374.jpg', '22', '0', '1');
INSERT INTO `adver` VALUES ('34', '111', '2017-12-08 06:30:17', '111', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/ad_15127146177925.jpg', '3333', '0', '1');
INSERT INTO `adver` VALUES ('35', '111', '2017-12-08 08:53:02', '111', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/ad_15127231787186.jpg', '3333', '0', '1');
INSERT INTO `adver` VALUES ('36', '111', '2017-12-08 08:53:27', '11111', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/ad_15127232048588.jpg', '3333', '0', '2');
INSERT INTO `adver` VALUES ('37', '111', '2017-12-08 09:03:17', '11111', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/ad_15127237926757.jpg', '3333', '0', '2');
INSERT INTO `adver` VALUES ('38', '11111', '2017-12-08 09:03:35', '111', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/ad_15127238137295.jpg', '3333', '0', '2');
INSERT INTO `adver` VALUES ('39', '11111', '2017-12-08 09:08:56', '111', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/ad_15127241277972.jpg', '3333', '0', '3');
INSERT INTO `adver` VALUES ('40', '11111', '2017-12-08 09:09:45', '111', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/ad_15127241762333.jpg', '3333', '0', '4');

-- ----------------------------
-- Table structure for assess
-- ----------------------------
DROP TABLE IF EXISTS `assess`;
CREATE TABLE `assess` (
  `asid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `eid` int(11) unsigned NOT NULL COMMENT '专家id',
  `medl` varchar(255) NOT NULL COMMENT '型号',
  `time` datetime NOT NULL COMMENT '时间',
  `color` varchar(255) NOT NULL COMMENT '颜色',
  `inv` varchar(30) NOT NULL COMMENT '发票号',
  `syn` decimal(6,2) NOT NULL COMMENT '专家建议价格',
  `pic` varchar(255) NOT NULL COMMENT '评估表',
  PRIMARY KEY (`asid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of assess
-- ----------------------------

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `cate_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cate_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cate_keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cate_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cate_view` int(255) NOT NULL,
  `cate_order` int(255) NOT NULL,
  `cate_pid` int(11) NOT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('96', '家用电器', '家用电器', '家用电器', '家用电器', '0', '0', '0');
INSERT INTO `category` VALUES ('97', '手机', '手机', '手机', '手机', '0', '0', '0');
INSERT INTO `category` VALUES ('98', '电脑', '电脑', '电脑', '电脑', '0', '0', '0');
INSERT INTO `category` VALUES ('99', '衣服', '衣服', '衣服', '衣服', '0', '0', '0');
INSERT INTO `category` VALUES ('100', '电饭锅', '电饭锅', '电饭锅', '电饭锅', '0', '0', '96');
INSERT INTO `category` VALUES ('101', '微波炉', '微波炉', '微波炉', '微波炉', '0', '0', '96');
INSERT INTO `category` VALUES ('102', '小米手机', '小米手机', '小米手机', '小米手机', '0', '0', '97');
INSERT INTO `category` VALUES ('103', '金立手机', '金立手机', '金立手机', '金立手机', '0', '0', '97');
INSERT INTO `category` VALUES ('104', '戴尔电脑', '戴尔电脑', '戴尔电脑', '戴尔电脑', '0', '0', '98');
INSERT INTO `category` VALUES ('105', '联想电脑', '联想电脑', '联想电脑', '联想电脑', '0', '0', '98');
INSERT INTO `category` VALUES ('106', '上衣', '上衣', '上衣', '上衣', '0', '0', '99');
INSERT INTO `category` VALUES ('108', '下衣', '下衣', '下衣', '下衣', '0', '0', '99');
INSERT INTO `category` VALUES ('109', '酒类', '酒类', '酒类', '酒类', '0', '0', '0');
INSERT INTO `category` VALUES ('110', '红酒', '红酒', '红酒', '红酒', '0', '0', '109');
INSERT INTO `category` VALUES ('111', '白酒', '白酒', '白酒', '白酒', '0', '0', '109');
INSERT INTO `category` VALUES ('112', '家具', '家具', '家具', '家具', '0', '0', '0');
INSERT INTO `category` VALUES ('113', '实木家具', '实木家具', '实木家具', '实木家具', '0', '0', '112');
INSERT INTO `category` VALUES ('114', '实木厨具', '实木厨具', '实木厨具', '实木厨具', '0', '0', '112');
INSERT INTO `category` VALUES ('115', '二手汽车', '二手汽车', '二手汽车', '二手汽车', '0', '0', '0');
INSERT INTO `category` VALUES ('116', '二手跑车', '二手跑车', '二手跑车', '二手跑车', '0', '0', '115');
INSERT INTO `category` VALUES ('117', '二手SUV', '二手SUV', '二手SUV', '二手SUV', '0', '0', '115');

-- ----------------------------
-- Table structure for cid
-- ----------------------------
DROP TABLE IF EXISTS `cid`;
CREATE TABLE `cid` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '成功案例id',
  `pid` int(10) unsigned NOT NULL COMMENT '详情id',
  `moto` varchar(255) NOT NULL COMMENT '型号',
  `time` datetime NOT NULL COMMENT '购买时间',
  `color` varchar(255) NOT NULL COMMENT '颜色',
  `inv` varchar(255) NOT NULL COMMENT '发票号',
  `synopsis` varchar(255) NOT NULL COMMENT '简介',
  `price` decimal(6,2) NOT NULL COMMENT '成交价',
  `gui` decimal(6,2) NOT NULL COMMENT '指导价',
  `pic` varchar(255) NOT NULL DEFAULT '' COMMENT '最少三张图片',
  `eid` int(10) NOT NULL COMMENT '在线专家',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cid
-- ----------------------------

-- ----------------------------
-- Table structure for collect
-- ----------------------------
DROP TABLE IF EXISTS `collect`;
CREATE TABLE `collect` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '表ID',
  `uid` int(11) unsigned NOT NULL COMMENT '用户id',
  `gid` int(11) unsigned NOT NULL COMMENT '收藏商品',
  `collectTime` datetime NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of collect
-- ----------------------------

-- ----------------------------
-- Table structure for fishpond
-- ----------------------------
DROP TABLE IF EXISTS `fishpond`;
CREATE TABLE `fishpond` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '表ID',
  `uid` int(11) unsigned NOT NULL COMMENT '塘主',
  `fishpondname` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '鱼塘名字',
  `unum` int(11) unsigned NOT NULL COMMENT '鱼塘人数',
  `status` int(11) unsigned NOT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of fishpond
-- ----------------------------
INSERT INTO `fishpond` VALUES ('1', '11', '鱼塘名字1', '1', '1');
INSERT INTO `fishpond` VALUES ('2', '22', '鱼塘名字2', '0', '0');
INSERT INTO `fishpond` VALUES ('6', '66', '鱼塘名字6', '0', '0');
INSERT INTO `fishpond` VALUES ('7', '77', '鱼塘名字7', '0', '0');
INSERT INTO `fishpond` VALUES ('8', '88', '鱼塘名字8', '0', '1');
INSERT INTO `fishpond` VALUES ('9', '99', '鱼塘名字9', '0', '1');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `gid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品表ID',
  `tid` int(11) unsigned NOT NULL COMMENT '商品类别ID',
  `fid` int(11) NOT NULL COMMENT '鱼塘ID',
  `pic` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '图片',
  `gstatus` int(10) unsigned NOT NULL COMMENT '状态',
  `price` decimal(10,0) unsigned NOT NULL COMMENT '商品价格',
  `gname` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品名称',
  `goodsDes` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品描述',
  `uid` int(11) NOT NULL COMMENT '用户id',
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('3', '33', '0', '图片1', '1', '0', '衣服1', '', '1');
INSERT INTO `goods` VALUES ('4', '33', '0', '图片2', '1', '0', '衣服2', '', '2');
INSERT INTO `goods` VALUES ('5', '33', '0', '图片3', '1', '0', '衣服3', '', '3');
INSERT INTO `goods` VALUES ('10', '33', '0', '图片4', '2', '9999999999', '衣服14', 'dsfasdf', '0');
INSERT INTO `goods` VALUES ('11', '0', '0', '图片5', '0', '0', '衣服5', '', '0');
INSERT INTO `goods` VALUES ('12', '33', '0', '图片6', '1', '0', '衣服6', '', '0');
INSERT INTO `goods` VALUES ('13', '0', '0', '图片7', '1', '0', '衣服7', '', '0');
INSERT INTO `goods` VALUES ('14', '0', '0', '图片8', '0', '0', '衣服8', '', '0');
INSERT INTO `goods` VALUES ('16', '0', '0', '图片9', '0', '0', '衣服9', '', '0');
INSERT INTO `goods` VALUES ('23', '33', '0', '图片10', '0', '100', '手机10', 'rdtfyguhijklgrhedtjuygiu', '0');
INSERT INTO `goods` VALUES ('24', '33', '0', '图片11', '0', '100', '手机', 'rdtfyguhijklgrhedtjuygiu粉色个人', '0');

-- ----------------------------
-- Table structure for goodsdetail
-- ----------------------------
DROP TABLE IF EXISTS `goodsdetail`;
CREATE TABLE `goodsdetail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品详情ID',
  `gid` int(11) unsigned DEFAULT NULL COMMENT '商品ID',
  `gmid` int(11) unsigned DEFAULT NULL COMMENT '商家留言',
  `zid` int(11) unsigned DEFAULT NULL COMMENT '专家验证',
  `score` int(11) unsigned DEFAULT NULL COMMENT '验证分数',
  `scl` int(11) unsigned DEFAULT NULL COMMENT '收藏数量',
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '宝贝介绍',
  `scc` int(10) unsigned DEFAULT NULL COMMENT '有无验证1有验证0无验证',
  `count` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of goodsdetail
-- ----------------------------
INSERT INTO `goodsdetail` VALUES ('1', '3', '1', '1', '1', '1', '1', '1', null, null);
INSERT INTO `goodsdetail` VALUES ('2', null, null, null, null, '100', '<p><img src=\"/uploads/ueditor/php/upload/image/20171205/1512492995658831.jpeg\" title=\"1512492995658831.jpeg\" alt=\"p_001.jpg\"/>范德萨范德萨发撒的发生地方撒地方的撒&lt;p&gt;发生的发生的发生的发生大发是vasdfasdfasd</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('3', null, null, null, null, '100', '<p><img src=\"/uploads/ueditor/php/upload/image/20171205/1512492995658831.jpeg\" title=\"1512492995658831.jpeg\" alt=\"p_001.jpg\"/>范德萨范德萨发撒的发生地方撒地方的撒&lt;p&gt;发生的发生的发/p&gt;但是发生大法师的法师</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('4', null, null, null, null, '100', '<p><img src=\"/uploads/ueditor/php/upload/image/20171205/1512492995658831.jpeg\" title=\"1512492995658831.jpeg\" alt=\"p_001.jpg\"/>范德萨范德萨发撒的发生地方撒地方的撒&lt;p&gt;发生的发生的发/p&gt;但是发生大法师的法师</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('5', null, null, null, null, '100', '<p><img src=\"/uploads/ueditor/php/upload/image/20171205/1512492995658831.jpeg\" title=\"1512492995658831.jpeg\" alt=\"p_001.jpg\"/>范德萨范德萨发撒的发生地方撒地方的撒&lt;p&gt;发生的发生的发/p&gt;但是发生大法师的法师</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('6', null, null, null, null, '100', '<p><img src=\"/uploads/ueditor/php/upload/image/20171205/1512492995658831.jpeg\" title=\"1512492995658831.jpeg\" alt=\"p_001.jpg\"/>范德萨范德萨发撒的发生地方撒地方的撒&lt;p&gt;发生的发生的发/p&gt;但是发生大法师的法师</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('7', null, null, null, null, '100', '<p><img src=\"/uploads/ueditor/php/upload/image/20171205/1512492995658831.jpeg\" title=\"1512492995658831.jpeg\" alt=\"p_001.jpg\"/>范德萨范德萨发撒的发生地方撒地方的撒&lt;p&gt;发生的发生的发生的</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('8', null, null, null, null, '100', '<p><img src=\"/uploads/ueditor/php/upload/image/20171205/1512492995658831.jpeg\" title=\"1512492995658831.jpeg\" alt=\"p_001.jpg\"/>范德萨范德萨发撒的发生地方撒地方的撒&lt;p&gt;发生的发生的发生的</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('9', null, null, null, null, '100', '<p><img src=\"/uploads/ueditor/php/upload/image/20171205/1512492995658831.jpeg\" title=\"1512492995658831.jpeg\" alt=\"p_001.jpg\"/>范德萨范德萨发撒的发生地方撒地方的撒&lt;p&gt;发生的发生的发生的</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('10', null, null, null, null, '100', '<p><img src=\"/uploads/ueditor/php/upload/image/20171205/1512492995658831.jpeg\" title=\"1512492995658831.jpeg\" alt=\"p_001.jpg\"/>范德萨范德萨发撒的发生地方撒地方的撒&lt;p&gt;发生的发生的发生的</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('12', '3', null, null, null, '100', '<p>从V字形从V字形从V字形从V型注册vdgsdfsvs的个数地方撒打发点告诉vdsfsdfsda割发代首公司打和三大浩丰科技阿萨德&nbsp;</p>', '0', null, null);

-- ----------------------------
-- Table structure for goodstype
-- ----------------------------
DROP TABLE IF EXISTS `goodstype`;
CREATE TABLE `goodstype` (
  `tid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品类别ID',
  `pid` int(11) unsigned NOT NULL COMMENT '父类ID',
  `tname` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '分类名字',
  `path` varchar(120) COLLATE utf8_unicode_ci NOT NULL COMMENT '路径',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of goodstype
-- ----------------------------

-- ----------------------------
-- Table structure for gpics
-- ----------------------------
DROP TABLE IF EXISTS `gpics`;
CREATE TABLE `gpics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `gpic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gid` int(11) DEFAULT NULL COMMENT '商品id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of gpics
-- ----------------------------
INSERT INTO `gpics` VALUES ('1', '12131', '1');
INSERT INTO `gpics` VALUES ('2', '4323', '1');
INSERT INTO `gpics` VALUES ('3', '23423', '1');
INSERT INTO `gpics` VALUES ('4', '23423', '1');
INSERT INTO `gpics` VALUES ('5', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15125544256658.jpg', '3');
INSERT INTO `gpics` VALUES ('6', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15125544179427.jpg', '3');
INSERT INTO `gpics` VALUES ('14', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15125544319224.jpg', '3');
INSERT INTO `gpics` VALUES ('15', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15125535171234.jpg', '3');
INSERT INTO `gpics` VALUES ('16', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15125544009962.jpg', '3');

-- ----------------------------
-- Table structure for home_users
-- ----------------------------
DROP TABLE IF EXISTS `home_users`;
CREATE TABLE `home_users` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `sex` varchar(5) NOT NULL COMMENT '性别',
  `tel` varchar(20) NOT NULL COMMENT '电话',
  `email` varchar(30) NOT NULL COMMENT '邮箱',
  `status` int(10) unsigned NOT NULL COMMENT '状态(1,可以使用2,注销)',
  `identity` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '身份（1:普通用户 2:鱼塘塘主)',
  `avatar` varchar(255) NOT NULL COMMENT '头像',
  `nickname` varchar(255) NOT NULL COMMENT '用户昵称',
  `is_active` tinyint(4) DEFAULT NULL COMMENT '用户是否激活',
  `token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of home_users
-- ----------------------------
INSERT INTO `home_users` VALUES ('1', 'admin111', '$2y$10$gcxrk39hW44.irRaXa2ZOuKG7apvHnSI0x6x8OxSu7mtAtTaz4f0O', 'w', '', '', '0', '2', '/uploads/151272516971755a2a5ab11c981.jpg', '啦啦啦1', null, null);
INSERT INTO `home_users` VALUES ('2', 'admin123', '$2y$10$PPPrRdqjALqb37F6fmmOiOg12zjx8zA61wixgeYz/8.CmVIVVqFFC', 'm', '', '', '0', '1', '/uploads/151261375472395a28a77aacbfe.jpg', 'fff', null, null);
INSERT INTO `home_users` VALUES ('71', 'nananana', '$2y$10$gCoQrwvD0TUppToFxnAsGO/4239cuNTRwBVPcAkY7thyRlkGlYLAO', 'm', '15704619282', '630350567278@qq.com', '0', '1', '/uploads/151308805868195a2fe43a137e4.jpg', 'nininini', '1', '123456');
INSERT INTO `home_users` VALUES ('75', '', '$2y$10$HsdCMij5z/s4ErAfJJV2OeAHAforNMDgPrFtYSQ0PRtVTrnA0WP9y', '', '', '630350567@qq.com', '0', '1', '', '', '0', '$2y$10$HsdCMij5z/s4ErAfJJV2OeAHAforNMDgPrFtYSQ0PRtVTrnA0WP9y');

-- ----------------------------
-- Table structure for links
-- ----------------------------
DROP TABLE IF EXISTS `links`;
CREATE TABLE `links` (
  `lid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lname` varchar(255) NOT NULL COMMENT '链接名称',
  `lurl` varchar(255) NOT NULL COMMENT '目标地址',
  `limg` varchar(255) NOT NULL COMMENT '链接图片',
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of links
-- ----------------------------
INSERT INTO `links` VALUES ('6', '百度', 'http://www.baidu.com', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/links_151266742638785a297922292b2.jpg');
INSERT INTO `links` VALUES ('7', '新浪', 'http://www.sina.com', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/links_151266745962895a2979431e7ac.jpg');
INSERT INTO `links` VALUES ('8', '搜狐', 'http://www.sohu.com', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/links_151266749686865a29796805728.jpg');
INSERT INTO `links` VALUES ('9', '优酷', 'http://www.youku.com', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/links_151266751648085a29797ce408d.jpg');
INSERT INTO `links` VALUES ('10', '爱奇艺', 'http://www.iqiyi.com', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/links_151266754461335a297998e9511.jpg');
INSERT INTO `links` VALUES ('11', '腾讯网', 'http://www.qq.com', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/links_151266776147915a297a7177772.jpg');
INSERT INTO `links` VALUES ('12', 'hao123', 'http://www.hao123.com', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/links_151266789114615a297af3c3bd7.jpg');

-- ----------------------------
-- Table structure for loginhistory
-- ----------------------------
DROP TABLE IF EXISTS `loginhistory`;
CREATE TABLE `loginhistory` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '表ID',
  `uid` int(11) unsigned NOT NULL COMMENT '用户ID',
  `lastTime` datetime NOT NULL COMMENT '时间',
  `newTIme` datetime NOT NULL COMMENT '时间',
  `loginNum` int(11) unsigned NOT NULL COMMENT '登录次数',
  `ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '登录',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of loginhistory
-- ----------------------------

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '表ID',
  `uid` int(11) unsigned NOT NULL COMMENT '留言用户id',
  `gid` int(11) unsigned NOT NULL COMMENT '商品id',
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `isAnonymity` char(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '是否匿名0匿名1实名',
  `msgDate` datetime NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of message
-- ----------------------------

-- ----------------------------
-- Table structure for nav
-- ----------------------------
DROP TABLE IF EXISTS `nav`;
CREATE TABLE `nav` (
  `nid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `paixu` int(255) NOT NULL COMMENT '排序',
  `nname` varchar(255) NOT NULL COMMENT '名称',
  `nlink` varchar(255) NOT NULL COMMENT '目标地址',
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nav
-- ----------------------------
INSERT INTO `nav` VALUES ('1', '1', '首页', '/home/index');
INSERT INTO `nav` VALUES ('2', '2', '我的鱼塘', '/home/fshop');
INSERT INTO `nav` VALUES ('3', '3', '开通鱼塘', '/home/sfshop');
INSERT INTO `nav` VALUES ('4', '4', '购物车', '购物车');
INSERT INTO `nav` VALUES ('5', '5', '我的订单', '我的订单');
INSERT INTO `nav` VALUES ('6', '6', '我的信息', '我的信息');

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `oid` char(18) COLLATE utf8_unicode_ci NOT NULL COMMENT '订单号',
  `oprice` decimal(10,2) unsigned NOT NULL COMMENT '订单总价',
  `number` int(11) unsigned NOT NULL COMMENT '总数量',
  `uid` int(11) unsigned NOT NULL COMMENT '订单用户ID',
  `add` char(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '收货地址',
  `status` char(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '状态(1未发货, 2已发货,3完成交易)',
  `ontime` datetime NOT NULL COMMENT '订单生成时间',
  `tel` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT '收货人电话',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '收货人',
  `des` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '客户备注',
  `pay` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '支付方式',
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('15127028095a2a0359', '60.00', '4', '0', '东北', '1', '0000-00-00 00:00:00', '12234567890', '', '', '');
INSERT INTO `order` VALUES ('15127040305a2a081e', '59.70', '4', '0', '北京天安门壹号', '1', '2017-12-08 03:33:50', '12312312323', '王五', '是的发送到发顺丰', '支付宝');
INSERT INTO `order` VALUES ('15127040675a2a0843', '59.70', '4', '0', '北京天安门壹号', '1', '2017-12-08 03:34:27', '12312312323', '王五', '是的发送到发顺丰', '支付宝');
INSERT INTO `order` VALUES ('15127240015a2a5621', '19.90', '1', '0', '11', '1', '2017-12-08 09:06:41', '11', '11', '11', '货到付款');
INSERT INTO `order` VALUES ('15127240515a2a5653', '19.90', '1', '0', '', '1', '2017-12-08 09:07:31', '', '', '', '货到付款');
INSERT INTO `order` VALUES ('15127241645a2a56c4', '19.90', '1', '0', '', '1', '2017-12-08 09:09:25', '', '', '', '货到付款');
INSERT INTO `order` VALUES ('15127242365a2a570c', '19.90', '1', '0', '', '1', '2017-12-08 09:10:36', '', '', '', '货到付款');
INSERT INTO `order` VALUES ('15127244855a2a5805', '19.90', '1', '0', '', '1', '2017-12-08 09:14:45', '', '', '', '货到付款');
INSERT INTO `order` VALUES ('15127245665a2a5856', '19.90', '1', '0', '', '1', '2017-12-08 09:16:06', '', '', '', '货到付款');
INSERT INTO `order` VALUES ('15127246445a2a58a4', '19.90', '1', '0', '', '1', '2017-12-08 09:17:24', '', '', '', '货到付款');
INSERT INTO `order` VALUES ('15127247085a2a58e4', '19.90', '1', '0', '', '1', '2017-12-08 09:18:28', '', '', '', '货到付款');
INSERT INTO `order` VALUES ('15127247735a2a5925', '19.90', '1', '0', '', '1', '2017-12-08 09:19:33', '', '', '', '货到付款');
INSERT INTO `order` VALUES ('15127248025a2a5942', '19.90', '1', '0', '', '1', '2017-12-08 09:20:02', '', '', '', '货到付款');
INSERT INTO `order` VALUES ('15127248535a2a5975', '19.90', '1', '0', '', '1', '2017-12-08 09:20:54', '', '', '', '货到付款');
INSERT INTO `order` VALUES ('15127250615a2a5a45', '19.90', '1', '0', '', '1', '2017-12-08 09:24:21', '', '', '', '货到付款');
INSERT INTO `order` VALUES ('15127312455a2a726d', '19.90', '1', '0', '', '1', '2017-12-08 11:07:25', '', '', '', '货到付款');
INSERT INTO `order` VALUES ('15127312565a2a7278', '19.90', '1', '0', '', '1', '2017-12-08 11:07:36', '', '', '', '货到付款');
INSERT INTO `order` VALUES ('15127313425a2a72ce', '19.90', '1', '0', '', '1', '2017-12-08 11:09:02', '', '', '', '货到付款');
INSERT INTO `order` VALUES ('15127318605a2a74d4', '29.80', '2', '0', '', '1', '2017-12-08 11:17:40', '', '', '', '货到付款');
INSERT INTO `order` VALUES ('15127319275a2a7517', '29.80', '2', '0', '', '1', '2017-12-08 11:18:48', '', '', '', '货到付款');
INSERT INTO `order` VALUES ('15127319575a2a7535', '29.80', '2', '0', '', '1', '2017-12-08 11:19:17', '', '', '', '货到付款');
INSERT INTO `order` VALUES ('15127319965a2a755c', '29.80', '2', '0', '', '1', '2017-12-08 11:19:57', '', '', '', '货到付款');
INSERT INTO `order` VALUES ('15127324295a2a770d', '29.80', '2', '0', '', '1', '2017-12-08 11:27:10', '', '', '', '货到付款');
INSERT INTO `order` VALUES ('15127325615a2a7791', '29.80', '2', '0', '', '1', '2017-12-08 11:29:21', '', '', '', '货到付款');

-- ----------------------------
-- Table structure for orderdetail
-- ----------------------------
DROP TABLE IF EXISTS `orderdetail`;
CREATE TABLE `orderdetail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `oid` char(18) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '订单号',
  `gid` int(11) unsigned NOT NULL COMMENT '商品id',
  `bprice` decimal(6,2) unsigned NOT NULL COMMENT '成交定价',
  `bcnt` int(255) unsigned NOT NULL COMMENT '购买数量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of orderdetail
-- ----------------------------
INSERT INTO `orderdetail` VALUES ('12', '15127028095a2a0359', '2', '19.90', '1');
INSERT INTO `orderdetail` VALUES ('13', '15127028095a2a0359', '1', '9.90', '2');
INSERT INTO `orderdetail` VALUES ('14', '15127028095a2a0359', '3', '29.90', '1');
INSERT INTO `orderdetail` VALUES ('15', '15127040085a2a0808', '2', '19.90', '1');
INSERT INTO `orderdetail` VALUES ('16', '15127040085a2a0808', '1', '9.90', '2');
INSERT INTO `orderdetail` VALUES ('17', '15127040085a2a0808', '3', '29.90', '1');
INSERT INTO `orderdetail` VALUES ('18', '15127040305a2a081e', '2', '19.90', '1');
INSERT INTO `orderdetail` VALUES ('19', '15127040305a2a081e', '1', '9.90', '2');
INSERT INTO `orderdetail` VALUES ('20', '15127040305a2a081e', '3', '29.90', '1');
INSERT INTO `orderdetail` VALUES ('21', '15127040675a2a0843', '2', '19.90', '1');
INSERT INTO `orderdetail` VALUES ('22', '15127040675a2a0843', '1', '9.90', '2');
INSERT INTO `orderdetail` VALUES ('23', '15127040675a2a0843', '3', '29.90', '1');
INSERT INTO `orderdetail` VALUES ('24', '15127240015a2a5621', '2', '19.90', '1');
INSERT INTO `orderdetail` VALUES ('25', '15127240515a2a5653', '2', '19.90', '1');
INSERT INTO `orderdetail` VALUES ('26', '15127241645a2a56c4', '2', '19.90', '1');
INSERT INTO `orderdetail` VALUES ('27', '15127242365a2a570c', '2', '19.90', '1');
INSERT INTO `orderdetail` VALUES ('28', '15127244855a2a5805', '2', '19.90', '1');
INSERT INTO `orderdetail` VALUES ('29', '15127245665a2a5856', '2', '19.90', '1');
INSERT INTO `orderdetail` VALUES ('30', '15127246445a2a58a4', '2', '19.90', '1');
INSERT INTO `orderdetail` VALUES ('31', '15127247085a2a58e4', '2', '19.90', '1');
INSERT INTO `orderdetail` VALUES ('32', '15127247735a2a5925', '2', '19.90', '1');
INSERT INTO `orderdetail` VALUES ('33', '15127248025a2a5942', '2', '19.90', '1');
INSERT INTO `orderdetail` VALUES ('34', '15127248535a2a5975', '2', '19.90', '1');
INSERT INTO `orderdetail` VALUES ('35', '15127250615a2a5a45', '2', '19.90', '1');
INSERT INTO `orderdetail` VALUES ('36', '15127312455a2a726d', '2', '19.90', '1');
INSERT INTO `orderdetail` VALUES ('37', '15127312565a2a7278', '2', '19.90', '1');
INSERT INTO `orderdetail` VALUES ('38', '15127313425a2a72ce', '2', '19.90', '1');
INSERT INTO `orderdetail` VALUES ('39', '15127318605a2a74d4', '2', '19.90', '1');
INSERT INTO `orderdetail` VALUES ('40', '15127318605a2a74d4', '1', '9.90', '1');
INSERT INTO `orderdetail` VALUES ('41', '15127319275a2a7517', '2', '19.90', '1');
INSERT INTO `orderdetail` VALUES ('42', '15127319275a2a7517', '1', '9.90', '1');
INSERT INTO `orderdetail` VALUES ('43', '15127319575a2a7535', '2', '19.90', '1');
INSERT INTO `orderdetail` VALUES ('44', '15127319575a2a7535', '1', '9.90', '1');
INSERT INTO `orderdetail` VALUES ('45', '15127319965a2a755c', '2', '19.90', '1');
INSERT INTO `orderdetail` VALUES ('46', '15127319965a2a755c', '1', '9.90', '1');
INSERT INTO `orderdetail` VALUES ('47', '15127324295a2a770d', '2', '19.90', '1');
INSERT INTO `orderdetail` VALUES ('48', '15127324295a2a770d', '1', '9.90', '1');
INSERT INTO `orderdetail` VALUES ('49', '15127325615a2a7791', '2', '19.90', '1');
INSERT INTO `orderdetail` VALUES ('50', '15127325615a2a7791', '1', '9.90', '1');

-- ----------------------------
-- Table structure for par
-- ----------------------------
DROP TABLE IF EXISTS `par`;
CREATE TABLE `par` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '详情id',
  `int` varchar(255) NOT NULL COMMENT '介绍',
  `ach` varchar(255) NOT NULL COMMENT '个人成就',
  `task` varchar(255) NOT NULL COMMENT '任务评价',
  `eid` int(10) unsigned NOT NULL COMMENT '专家id',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of par
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '权限表',
  `name` varchar(255) DEFAULT NULL COMMENT '权限表',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', '增加轮播图', '/admin/ad/lunbotu');
INSERT INTO `permissions` VALUES ('2', '删除轮播图', '/admin/ad/lunbotushanchu');
INSERT INTO `permissions` VALUES ('3', '修改轮播图', '/admin/ad/lunbotuxiugai');
INSERT INTO `permissions` VALUES ('4', '查看轮播图', '/admin/ad/lunbotuchakan');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '角色表',
  `name` varchar(50) DEFAULT NULL COMMENT '角色名称',
  `description` varchar(255) DEFAULT NULL COMMENT '角色描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', '超级管理员', '拥有最大权限');
INSERT INTO `role` VALUES ('2', '一级管理员', '拥有增删改查的权限');
INSERT INTO `role` VALUES ('4', '二级管理员', '拥有增加和查看的权限');

-- ----------------------------
-- Table structure for role_permission
-- ----------------------------
DROP TABLE IF EXISTS `role_permission`;
CREATE TABLE `role_permission` (
  `role_id` int(11) NOT NULL COMMENT '角色ID',
  `permission_id` int(11) NOT NULL COMMENT '权限ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role_permission
-- ----------------------------
INSERT INTO `role_permission` VALUES ('2', '1');
INSERT INTO `role_permission` VALUES ('2', '2');
INSERT INTO `role_permission` VALUES ('2', '3');
INSERT INTO `role_permission` VALUES ('2', '4');
INSERT INTO `role_permission` VALUES ('4', '1');
INSERT INTO `role_permission` VALUES ('4', '4');
INSERT INTO `role_permission` VALUES ('1', '1');
INSERT INTO `role_permission` VALUES ('1', '2');
INSERT INTO `role_permission` VALUES ('1', '3');
INSERT INTO `role_permission` VALUES ('1', '4');

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `user_id` int(11) NOT NULL COMMENT '用户表在关联表的外键',
  `role_id` int(11) NOT NULL COMMENT '角色表在关联表单外键'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES ('3', '1');
INSERT INTO `role_user` VALUES ('3', '2');
INSERT INTO `role_user` VALUES ('2', '1');
INSERT INTO `role_user` VALUES ('2', '2');
INSERT INTO `role_user` VALUES ('2', '4');
INSERT INTO `role_user` VALUES ('1', '1');
INSERT INTO `role_user` VALUES ('1', '2');

-- ----------------------------
-- Table structure for shop_cart
-- ----------------------------
DROP TABLE IF EXISTS `shop_cart`;
CREATE TABLE `shop_cart` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '购物车表ID',
  `gid` int(11) unsigned NOT NULL COMMENT '商品ID',
  `uid` int(11) unsigned NOT NULL COMMENT '用户ID',
  `num` int(11) unsigned NOT NULL COMMENT '单类数量',
  `otime` datetime NOT NULL COMMENT '放入时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of shop_cart
-- ----------------------------

-- ----------------------------
-- Table structure for slid
-- ----------------------------
DROP TABLE IF EXISTS `slid`;
CREATE TABLE `slid` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `simg` varchar(255) NOT NULL COMMENT '图片路径',
  `surl` varchar(255) NOT NULL COMMENT '跳转地址',
  `nid` int(10) NOT NULL COMMENT '轮播图状态 1:加入,2:下架',
  `sort` varchar(255) NOT NULL COMMENT '排序',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of slid
-- ----------------------------

-- ----------------------------
-- Table structure for user_details
-- ----------------------------
DROP TABLE IF EXISTS `user_details`;
CREATE TABLE `user_details` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '表ID',
  `uid` int(11) unsigned NOT NULL COMMENT '用户ID',
  `fid` int(11) unsigned NOT NULL COMMENT '鱼塘ID',
  `face` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '头像',
  `number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '积分',
  `addr` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user_details
-- ----------------------------

-- ----------------------------
-- Table structure for webs
-- ----------------------------
DROP TABLE IF EXISTS `webs`;
CREATE TABLE `webs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '网站名称',
  `describe` varchar(255) NOT NULL COMMENT '网站描述',
  `logo` varchar(255) NOT NULL COMMENT '网站logo',
  `filing` varchar(255) NOT NULL COMMENT '网站备案号',
  `telephone` varchar(255) NOT NULL COMMENT '联系方式',
  `status` int(10) NOT NULL COMMENT '1:开启网站,2:网站维护',
  `url` varchar(255) NOT NULL COMMENT '网站地址',
  `cright` varchar(255) NOT NULL COMMENT '版权信息',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of webs
-- ----------------------------

-- ----------------------------
-- Table structure for zj
-- ----------------------------
DROP TABLE IF EXISTS `zj`;
CREATE TABLE `zj` (
  `eid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '在线专家id',
  `sex` varchar(5) NOT NULL COMMENT '性别',
  `age` int(5) unsigned NOT NULL COMMENT '年龄',
  `zname` varchar(255) NOT NULL COMMENT '专家姓名',
  `undergo` varchar(255) NOT NULL COMMENT '经验',
  `pswd` varchar(255) NOT NULL COMMENT '密码',
  `zpic` varchar(255) NOT NULL COMMENT '专家证书',
  `headpic` varchar(255) NOT NULL COMMENT '头像',
  `phone` varchar(11) NOT NULL COMMENT '电话',
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zj
-- ----------------------------

-- ----------------------------
-- Table structure for zss
-- ----------------------------
DROP TABLE IF EXISTS `zss`;
CREATE TABLE `zss` (
  `zid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '回收id',
  `tid` int(10) unsigned NOT NULL COMMENT '类别id',
  `medl` varchar(255) NOT NULL COMMENT '型号',
  `time` datetime NOT NULL COMMENT '购买时间',
  `color` varchar(255) NOT NULL COMMENT '颜色',
  `inv` varchar(255) NOT NULL COMMENT '发票号',
  `syn` varchar(255) NOT NULL COMMENT '简介',
  `price` decimal(6,2) NOT NULL COMMENT '卖家价格',
  `pic` varchar(255) NOT NULL COMMENT '最少三张图片',
  PRIMARY KEY (`zid`,`price`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zss
-- ----------------------------
