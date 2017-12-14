/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : dianxiaoer

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-12-14 19:38:52
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
  `isStaAdd` tinyint(5) NOT NULL DEFAULT '1' COMMENT '是否默认地址  2为默认地址',
  `uid` int(11) unsigned NOT NULL COMMENT '前台用户id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of address
-- ----------------------------
INSERT INTO `address` VALUES ('1', '宋寿强', '15704619282', '江西省抚州市资溪县巴拉巴拉', '1', '2');
INSERT INTO `address` VALUES ('3', '宋先生', '15704619282', '福建省南平市松源镇巴拉巴拉', '1', '2');
INSERT INTO `address` VALUES ('4', '王先生', '15704619282', '江苏省盐城市合德镇哔哩哔哩', '1', '2');
INSERT INTO `address` VALUES ('12', '宋先生', '15704619282', '河南省平顶山市鲁山县略略略', '1', '2');
INSERT INTO `address` VALUES ('13', '', '', '省份地级市市、县级市', '1', '6');
INSERT INTO `address` VALUES ('14', '刘宝根', '18333600013', '河北省石家庄市晋州市村', '1', '7');
INSERT INTO `address` VALUES ('15', '毛主席', '18888888888', '北京市北京市东城区天安门1号', '1', '8');
INSERT INTO `address` VALUES ('17', '刘宝根', '122222222', '江西省上饶市鄱阳县默认地址', '2', '8');
INSERT INTO `address` VALUES ('18', '啦啦', '11111112222', '安徽省池州市青阳县爱迪生', '1', '8');
INSERT INTO `address` VALUES ('19', '哈哈', '123123123', '山东省济宁市汶上镇阿萨德', '1', '8');
INSERT INTO `address` VALUES ('20', '啊啊', '1231231212', '河南省信阳市新县啊啊', '1', '8');
INSERT INTO `address` VALUES ('21', '呵呵哒', '1414141', '山东省莱芜市莱城区安安安', '1', '8');

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
INSERT INTO `admin_users` VALUES ('1', 'admin', '$2y$10$f7iJm0mkJWwAFffzdk4Q3eCgjKFWwLHRKPedaJcP4KrQE0q/K2V/G', '15704619282', '630350567@qq.com', '1', '1', 'm', '/uploads/151253117268205a2764e4897d1.jpg');
INSERT INTO `admin_users` VALUES ('11', 'sssss123', '$2y$10$I4pU7DuCaqqAYGAqNBSY..8x1FExn4jx17UssKURVt0cfy7/Lbjqq', '15704619282', '630350567@qq.com', '0', '1', 'm', '/uploads/151272416196345a2a56c18a8c5.jpg');
INSERT INTO `admin_users` VALUES ('12', 'qqqqq', '$2y$10$VzlSHHov6PUxXbCzsphho..JrVLg3tmjzT3idZyXgO5hgTa2/kqDW', '15704619287', '630350567278@qq.com', '0', '0', 'x', '/uploads/151272511998255a2a5a7f3f0de.jpg');
INSERT INTO `admin_users` VALUES ('14', 'admin', '$2y$10$kcwdUVfP6LoQKXdyp3crruDUTsAZdPbn1FTB6s7S5pvZKSMIz4BMa', '15704619282', '123123123@qq.com', '0', '0', 'w', '/uploads/151272425950145a2a5723860e9.jpg');
INSERT INTO `admin_users` VALUES ('15', 'qwert', '$2y$10$kIYZenHoX3McoNJFEFbs4O3kucenv4pJFcr1hkxs.ruPUEUqD1ZNG', '15704619282', '630350567@qq.com', '0', '0', 'w', '');

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
INSERT INTO `adver` VALUES ('32', '1111', '0000-00-00 00:00:00', '111', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/ad_15131746693842.jpg', '3333', '0', '1');
INSERT INTO `adver` VALUES ('33', '21', '0000-00-00 00:00:00', '6666', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/ad_15127140106374.jpg', '22', '0', '1');
INSERT INTO `adver` VALUES ('34', '111', '2017-12-08 06:30:17', '111', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/ad_15127146177925.jpg', '3333', '0', '1');
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
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
INSERT INTO `category` VALUES ('113', '实木家具', '实木家具', '实木家具', '实木家具', '0', '1', '112');
INSERT INTO `category` VALUES ('114', '实木厨具', '实木厨具', '实木厨具', '实木厨具', '0', '0', '112');
INSERT INTO `category` VALUES ('115', '二手汽车', '二手汽车', '二手汽车', '二手汽车', '0', '0', '0');
INSERT INTO `category` VALUES ('116', '二手跑车', '二手跑车', '二手跑车', '二手跑车', '0', '0', '115');
INSERT INTO `category` VALUES ('118', '二手SUV', '二手SUV', '二手SUV', '二手SUV', '0', '1', '115');

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
INSERT INTO `fishpond` VALUES ('1', '11', '鱼塘名字1', '1', '0');
INSERT INTO `fishpond` VALUES ('2', '22', '鱼塘名字2', '0', '0');
INSERT INTO `fishpond` VALUES ('6', '66', '鱼塘名字6', '0', '1');
INSERT INTO `fishpond` VALUES ('7', '77', '鱼塘名字7', '0', '0');
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
  `focus` int(11) DEFAULT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('25', '106', '1', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15127418828449.jpg', '1', '100', '上衣~', '二十多突然反悔就OK记录卡是搭建符大是大非发的', '0', null);
INSERT INTO `goods` VALUES ('26', '106', '2', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15127420647620.jpg', '1', '200', '内衣', '来自火星的衣服~ 只有想不到没有~ 没有的~~~~~~~~~~~~', '0', null);
INSERT INTO `goods` VALUES ('27', '106', '3', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15127423447477.jpg', '0', '100', '连衣裙', '最美的衣服~ 来时店小二~  我们的~~~~~~~好', '0', null);
INSERT INTO `goods` VALUES ('29', '110', '1', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15127457938588.jpg', '0', '1200', '没有', '到返回sad货款纠纷哈速度快两极分化发货撒大健康合法 发送肯德基', '2', null);
INSERT INTO `goods` VALUES ('30', '110', '1', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15127466327529.jpg', '0', '19', 'meiun', 'FDAOSDIHFOIASD SD HVAdlsfkjhasdkjf hasdfhkjasd ckxzhvk jsadf', '0', null);
INSERT INTO `goods` VALUES ('31', '104', '1', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15127476172551.jpg', '0', '10002', 'fsadifhsaodif ', 'fjksdahjch kxhc zhxcv kzhv ', '0', null);
INSERT INTO `goods` VALUES ('32', '101', '1', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128047775463.jpg', '0', '199', '多功能', '啊4535324657687978978743524325787坡六65786785653525868708765314355486806987453524896898765357489806987643567476898765367857978655', '0', null);
INSERT INTO `goods` VALUES ('33', '100', '1', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128051016762.jpg', '0', '199', '小米', '阿迪萨斯所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所', '0', null);
INSERT INTO `goods` VALUES ('34', '100', '1', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128052128660.jpg', '0', '111', '小天鹅', '阿迪萨斯所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所所', '0', null);
INSERT INTO `goods` VALUES ('35', '100', '1', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128053105556.jpg', '0', '100', '美女', '法撒旦法啥都看见回访记录卡还是贷款计划才看见爱上的框架三大浩丰科技as对话框', '0', null);
INSERT INTO `goods` VALUES ('36', '106', '1', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128053351985.jpg', '0', '299', '阿迪达斯上衣', '爱上师大所大所大所大所大所大所大所大所大所多', '0', null);
INSERT INTO `goods` VALUES ('37', '106', '1', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128053577551.jpg', '0', '190', '发的开发', '发生的发生大了空间发挥卡萨丁计划付款计划sad框架好框架第三方来看撒娇电话客服哈市科技 发达房间卡啥都看见', '0', null);
INSERT INTO `goods` VALUES ('38', '100', '1', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128053958645.jpg', '0', '100', '发到付', '飞洒第六空间浩丰科技四大皆空理发啥都看见和法律框架傻掉了尽快发货昆仑决色导航法律框架好的了', '0', null);
INSERT INTO `goods` VALUES ('39', '100', '1', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128057379247.jpg', '0', '112', '黑天鹅', '中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!', '0', null);
INSERT INTO `goods` VALUES ('40', '100', '1', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128058204788.jpg', '0', '111', '黑天鹅', '中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!', '0', null);
INSERT INTO `goods` VALUES ('41', '100', '1', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128058441737.jpg', '0', '111', '大黑天鹅', '中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!', '0', null);
INSERT INTO `goods` VALUES ('42', '101', '0', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128058732161.jpg', '1', '3333', '大黑耗子', '中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!', '0', null);
INSERT INTO `goods` VALUES ('43', '101', '1', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128059284024.jpg', '0', '33', '大黑狗', '中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!', '0', null);
INSERT INTO `goods` VALUES ('44', '100', '0', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128059872594.jpg', '2', '19922', '电子狗', '中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!', '0', null);
INSERT INTO `goods` VALUES ('45', '105', '1', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128060114698.jpg', '0', '19922', '电子狗', '中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!', '0', null);
INSERT INTO `goods` VALUES ('46', '110', '0', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128060114698.jpg', '0', '19922', '牛栏山80年', '中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!', '0', null);
INSERT INTO `goods` VALUES ('47', '111', '1', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128061021500.jpg', '0', '1992231', '牛栏山810年', '中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!', '0', null);
INSERT INTO `goods` VALUES ('48', '113', '0', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128061525108.jpg', '0', '1888888', '八成新楠木棺材', '中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!', '0', null);
INSERT INTO `goods` VALUES ('49', '113', '1', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128062148051.jpg', '0', '1888888', '新款紫檀棺材', '中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!', '0', null);
INSERT INTO `goods` VALUES ('50', '114', '0', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128062735526.jpg', '0', '1888888', '加15 荒芜太刀', '中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!', '0', null);
INSERT INTO `goods` VALUES ('51', '114', '1', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128062735526.jpg', '0', '222', '加11 打狗棒', '中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!', '0', null);
INSERT INTO `goods` VALUES ('52', '114', '1', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128063614789.jpg', '0', '222', '加1 老太太的拐棍', '中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!', '0', null);
INSERT INTO `goods` VALUES ('53', '116', '1', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128063614789.jpg', '0', '111', '天子二代', '中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!', '0', null);
INSERT INTO `goods` VALUES ('54', '116', '1', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128063614789.jpg', '0', '1111', '天子二代新款', '中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!', '0', null);
INSERT INTO `goods` VALUES ('55', '100', '1', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128065168295.jpg', '0', '111111', '超音速电子狗', '中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!', '0', null);
INSERT INTO `goods` VALUES ('56', '100', '1', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128065168295.jpg', '0', '111111', '超音速电子狗', '中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!', '0', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
INSERT INTO `goodsdetail` VALUES ('13', '25', null, null, null, '15', '<p><img src=\"/uploads/ueditor/php/upload/image/20171208/1512742226780232.jpeg\" title=\"1512742226780232.jpeg\" alt=\"3a92051e5bce451f685797cd55d70ce0.jpg\"/></p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('14', '29', null, null, null, '10', '<p><img src=\"/uploads/ueditor/php/upload/image/20171208/1512745848762554.jpeg\" title=\"1512745848762554.jpeg\" alt=\"2b82fc7aa139610b144728283b4531e1.jpg\"/>防守打法框架哈速度快看 货到付款江安河说的科技时代分开啦</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('15', '30', null, null, null, '10', '<p><img src=\"/uploads/ueditor/php/upload/image/20171208/1512747061177728.jpeg\" title=\"1512747061177728.jpeg\" alt=\"141467111a25e3db0eb0048526065f5a.jpg\"/>khdsfhksdankjvchd lk dskfk sadkjc</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('16', '30', null, null, null, '12', '<p>fasdfasdofjsadkcjsdkjhckjsdacjbsadbcjksdkfcjasf</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('17', '17', null, null, null, '15', '<p>fsadiofhishvxckhzjclkxzvckjghaksjdcjzxkcbZXBChjZBJdffdgsad</p><p>}\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('18', '32', null, null, null, '11', '<p>大萨达多所阿萨达&nbsp; 阿萨达啊爱上大啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊阿萨达多多多多多多多大奥所多多多多多多多多多多多多多多多多多多多多多多多多多多多多多多多多多多多多多多多多多多多多多多多多多多&nbsp;</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('19', '33', null, null, null, '11', '<p>撒打算打算的大多是答案复合弓SLHOHGLOHOGHAWOLGHAJLSGHJSKAHGASHOLU</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('20', '34', null, null, null, '1111', '<p>年是哦电脑哦啊好的搜号哈佛案件佛号庵后防洪费后方豆类或发哦是否还哦啊哈佛庵后if侯爱华佛&nbsp;</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('21', '35', null, null, null, '100', '<p>士大夫还是打开了几分哈上看的浩丰科技sad货款发三大浩丰科技sad哈伦裤级发纠纷 贷款是否卡萨丁黑科技</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('22', '36', null, null, null, '10', '<p>挖热水袋套房源股hi进而他的衣服号就哦啊二十多分也就是他的衣服号哈认识他的衣服染色体衣服回家而他的一份更好&nbsp;</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('23', '37', null, null, null, '100', '<p>时东方哈市地方看见啊好当升科技冯老师大客户方科技挥洒的尽快发货啊施蒂利克 速度快级发卡金士顿好</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('24', '38', null, null, null, '10', '<p>法撒旦ofoisad积分换空间 时东方黑科技sad后付款科技货收到了看风景sad看<br/></p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('25', '39', null, null, null, '11', '<p>中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('26', '40', null, null, null, '5', '<p>中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('27', '41', null, null, null, '33', '<p>中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('28', '42', null, null, null, '112', '<p>中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('29', '43', null, null, null, '10', '<p>中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('30', '44', null, null, null, '12', '<p>中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('31', '45', null, null, null, '18', '<p>中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('32', '46', null, null, null, '112', '<p>中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('33', '47', null, null, null, '9', '<p>中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('34', '48', null, null, null, '123', '<p>中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('35', '49', null, null, null, '11', '<p>中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('36', '50', null, null, null, '11', '<p>中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('37', '51', null, null, null, '11', '<p>中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('38', '52', null, null, null, '123', '<p>1中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('39', '53', null, null, null, '12', '<p>中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('40', '54', null, null, null, '12', '<p>中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('41', '55', null, null, null, '11', '<p>中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('42', '56', null, null, null, '22', '<p>中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!中国共产党万岁!社会主义好!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('43', '57', null, null, null, '22', '<p>中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('44', '58', null, null, null, '22', '<p>中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('45', '59', null, null, null, '234', '<p>中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('46', '60', null, null, null, '11', '<p>中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('47', '61', null, null, null, '6', '<p>中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('48', '62', null, null, null, '2', '<p>中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('49', '63', null, null, null, '11', '<p>中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('50', '64', null, null, null, '123', '<p>中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('51', '65', null, null, null, '1', '<p>中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('52', '66', null, null, null, '12', '<p>中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('53', '67', null, null, null, '21', '<p>中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('54', '68', null, null, null, '2', '<p>中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('55', '69', null, null, null, '11', '<p>中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('56', '70', null, null, null, '12', '<p>中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('57', '71', null, null, null, '212', '<p>中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('58', '72', null, null, null, '21', '<p>中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('59', '73', null, null, null, '221', '<p>中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('60', '73', null, null, null, '221', '<p>中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('61', '75', null, null, null, '2', '<p>中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('62', '76', null, null, null, '11', '<p>中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!中国共产党万岁!!社会主义万岁!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('63', '77', null, null, null, '1', '<p>中国社会主义好,中国共产党万岁,中国万岁!中国社会主义好,中国共产党万岁,中国万岁!中国社会主义好,中国共产党万岁,中国万岁!中国社会主义好,中国共产党万岁,中国万岁!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('64', '78', null, null, null, '2', '<p>中国社会主义好,中国共产党万岁,中国万岁!中国社会主义好,中国共产党万岁,中国万岁!中国社会主义好,中国共产党万岁,中国万岁!中国社会主义好,中国共产党万岁,中国万岁!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('65', '79', null, null, null, '2', '<p>中国社会主义好,中国共产党万岁,中国万岁!中国社会主义好,中国共产党万岁,中国万岁!中国社会主义好,中国共产党万岁,中国万岁!中国社会主义好,中国共产党万岁,中国万岁!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('66', '80', null, null, null, '3', '<p>中国社会主义好,中国共产党万岁,中国万岁!中国社会主义好,中国共产党万岁,中国万岁!中国社会主义好,中国共产党万岁,中国万岁!中国社会主义好,中国共产党万岁,中国万岁!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('67', '81', null, null, null, '7', '<p>为什么要有描述,看了你能信吗,你是不是傻,为什么描述这么长 ,这么长, 这么TM的长!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('68', '82', null, null, null, '9', '<p>为什么要有描述,看了你能信吗,你是不是傻,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('69', '83', null, null, null, '21', '<p>,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('70', '85', null, null, null, '2', '<p>,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('71', '91', null, null, null, '2', '<p>,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('72', '93', null, null, null, '2', '<p>,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('73', '94', null, null, null, '21', '<p>,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('74', '95', null, null, null, '5', '<p>,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!</p>', '0', null, null);
INSERT INTO `goodsdetail` VALUES ('75', '96', null, null, null, '8', '<p>,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!,为什么描述这么长 ,这么长, 这么TM的长!</p>', '0', null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of gpics
-- ----------------------------
INSERT INTO `gpics` VALUES ('5', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15125544256658.jpg', '3');
INSERT INTO `gpics` VALUES ('6', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15125544179427.jpg', '3');
INSERT INTO `gpics` VALUES ('14', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15125544319224.jpg', '3');
INSERT INTO `gpics` VALUES ('15', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15125535171234.jpg', '3');
INSERT INTO `gpics` VALUES ('16', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15125544009962.jpg', '3');
INSERT INTO `gpics` VALUES ('18', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15127421928273.jpg', '25');
INSERT INTO `gpics` VALUES ('19', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15127422004530.jpg', '25');
INSERT INTO `gpics` VALUES ('20', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15127422058860.jpg', '25');
INSERT INTO `gpics` VALUES ('42', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15127502968026.jpg', '30');
INSERT INTO `gpics` VALUES ('47', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15127503103616.jpg', '30');
INSERT INTO `gpics` VALUES ('48', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15127556931347.jpg', '29');
INSERT INTO `gpics` VALUES ('49', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15127556842785.jpg', '29');
INSERT INTO `gpics` VALUES ('50', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15127557087596.jpg', '29');
INSERT INTO `gpics` VALUES ('51', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128051405564.jpg', '33');
INSERT INTO `gpics` VALUES ('52', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128052195047.jpg', '34');
INSERT INTO `gpics` VALUES ('53', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128053559492.jpg', '36');
INSERT INTO `gpics` VALUES ('54', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128053695751.jpg', '37');
INSERT INTO `gpics` VALUES ('55', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128054068498.jpg', '38');
INSERT INTO `gpics` VALUES ('56', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128057909520.jpg', '39');
INSERT INTO `gpics` VALUES ('57', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128058279363.jpg', '40');
INSERT INTO `gpics` VALUES ('58', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15131755546070.jpg', '42');
INSERT INTO `gpics` VALUES ('59', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128059359590.jpg', '43');
INSERT INTO `gpics` VALUES ('60', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128059943116.jpg', '44');
INSERT INTO `gpics` VALUES ('61', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128060189854.jpg', '45');
INSERT INTO `gpics` VALUES ('62', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128060759245.jpg', '46');
INSERT INTO `gpics` VALUES ('63', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128061101898.jpg', '47');
INSERT INTO `gpics` VALUES ('64', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128061593864.jpg', '48');
INSERT INTO `gpics` VALUES ('65', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128061632931.jpg', '48');
INSERT INTO `gpics` VALUES ('66', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128062245205.jpg', '49');
INSERT INTO `gpics` VALUES ('67', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128062813496.jpg', '50');
INSERT INTO `gpics` VALUES ('68', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128063193066.jpg', '51');
INSERT INTO `gpics` VALUES ('69', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128063676164.jpg', '52');
INSERT INTO `gpics` VALUES ('70', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128064053061.jpg', '53');
INSERT INTO `gpics` VALUES ('71', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128064356059.jpg', '54');
INSERT INTO `gpics` VALUES ('72', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128065224812.jpg', '55');
INSERT INTO `gpics` VALUES ('73', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128065962305.jpg', '56');
INSERT INTO `gpics` VALUES ('74', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128067133328.jpg', '57');
INSERT INTO `gpics` VALUES ('75', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128067615408.jpg', '58');
INSERT INTO `gpics` VALUES ('76', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128068066925.jpg', '59');
INSERT INTO `gpics` VALUES ('77', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128068766426.jpg', '61');
INSERT INTO `gpics` VALUES ('78', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128069138128.jpg', '62');
INSERT INTO `gpics` VALUES ('79', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128069663001.jpg', '63');
INSERT INTO `gpics` VALUES ('80', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128069963880.jpg', '64');
INSERT INTO `gpics` VALUES ('81', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128070284569.jpg', '65');
INSERT INTO `gpics` VALUES ('82', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128070617578.jpg', '66');
INSERT INTO `gpics` VALUES ('83', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128071002214.jpg', '67');
INSERT INTO `gpics` VALUES ('84', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128071328770.jpg', '68');
INSERT INTO `gpics` VALUES ('85', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128072119648.jpg', '69');
INSERT INTO `gpics` VALUES ('86', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128072696749.jpg', '70');
INSERT INTO `gpics` VALUES ('87', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128073148616.jpg', '71');
INSERT INTO `gpics` VALUES ('88', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128073597083.jpg', '72');
INSERT INTO `gpics` VALUES ('89', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128074307897.jpg', '73');
INSERT INTO `gpics` VALUES ('90', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128074958638.jpg', '75');
INSERT INTO `gpics` VALUES ('91', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128075497871.jpg', '76');
INSERT INTO `gpics` VALUES ('92', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128076937123.jpg', '77');
INSERT INTO `gpics` VALUES ('93', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128077254080.jpg', '78');
INSERT INTO `gpics` VALUES ('94', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128077512663.jpg', '79');
INSERT INTO `gpics` VALUES ('95', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128077866574.jpg', '80');
INSERT INTO `gpics` VALUES ('96', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128078779126.jpg', '81');
INSERT INTO `gpics` VALUES ('97', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128079064112.jpg', '82');
INSERT INTO `gpics` VALUES ('98', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128079416875.jpg', '83');
INSERT INTO `gpics` VALUES ('99', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128080111089.jpg', '85');
INSERT INTO `gpics` VALUES ('100', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128083236529.jpg', '91');
INSERT INTO `gpics` VALUES ('101', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128084131063.jpg', '93');
INSERT INTO `gpics` VALUES ('102', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128086418846.jpg', '95');
INSERT INTO `gpics` VALUES ('103', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15128086911061.jpg', '96');
INSERT INTO `gpics` VALUES ('104', 'http://cmbgl.oss-cn-beijing.aliyuncs.com/15131755498672.jpg', '42');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of home_users
-- ----------------------------
INSERT INTO `home_users` VALUES ('7', '刘先生', '$2y$10$QDpa3Fs1S8UymuVL4cW32ed9JowQSV4MpbKUVU4/j4e2p4SbB5bPS', '', '18333600013', 'cm_bgl@163.com', '0', '1', '/uploads/151317328192275a31312179199.jpg', '', '1', '$2y$10$QDpa3Fs1S8UymuVL4cW32ed9JowQSV4MpbKUVU4/j4e2p4SbB5bPS');
INSERT INTO `home_users` VALUES ('8', '', '$2y$10$i19TsA1C4dfsCPTSM/6yeeEhLGj5sEZwcLrthTgL.peXHgPVe0Ao.', '', '', '1418432506@qq.com', '0', '1', '', '', '1', '$2y$10$i19TsA1C4dfsCPTSM/6yeeEhLGj5sEZwcLrthTgL.peXHgPVe0Ao.');

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
  `msgDate` datetime NOT NULL COMMENT '时间',
  `pid` int(11) DEFAULT NULL COMMENT '父id',
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES ('1', '1', '81', 'dsfasdfsdafsda', '2017-12-11 11:52:16', '0', null, '');
INSERT INTO `message` VALUES ('2', '1', '81', 'fhjkasdhfk', '0000-00-00 00:00:00', '0', null, '');
INSERT INTO `message` VALUES ('3', '2', '81', '当升科技发', '0000-00-00 00:00:00', '0', null, '');
INSERT INTO `message` VALUES ('21', '1', '81', '', '0000-00-00 00:00:00', '0', null, '');
INSERT INTO `message` VALUES ('22', '1', '81', '', '0000-00-00 00:00:00', '1', null, '');
INSERT INTO `message` VALUES ('23', '1', '81', '', '0000-00-00 00:00:00', '2', null, '');
INSERT INTO `message` VALUES ('24', '2', '81', '', '0000-00-00 00:00:00', '3', null, '');
INSERT INTO `message` VALUES ('25', '2', '81', '', '0000-00-00 00:00:00', '21', null, '');
INSERT INTO `message` VALUES ('26', '2', '81', '', '0000-00-00 00:00:00', '22', null, '2');
INSERT INTO `message` VALUES ('27', '1', '81', '', '0000-00-00 00:00:00', '26', null, '2');
INSERT INTO `message` VALUES ('28', '1', '81', '', '0000-00-00 00:00:00', '2', null, '2');
INSERT INTO `message` VALUES ('29', '1', '0', '', '0000-00-00 00:00:00', '0', null, '');
INSERT INTO `message` VALUES ('30', '1', '0', '', '0000-00-00 00:00:00', '0', null, null);
INSERT INTO `message` VALUES ('31', '1', '0', '', '0000-00-00 00:00:00', '0', null, null);
INSERT INTO `message` VALUES ('32', '1', '0', '', '0000-00-00 00:00:00', '0', null, null);
INSERT INTO `message` VALUES ('33', '1', '0', '', '0000-00-00 00:00:00', '0', null, null);
INSERT INTO `message` VALUES ('34', '1', '81', 'dasfnkjashdfkhask', '2017-12-12 13:15:04', '0', null, null);
INSERT INTO `message` VALUES ('35', '1', '81', 'wo fkasdhko', '2017-12-12 13:15:40', '0', null, null);
INSERT INTO `message` VALUES ('36', '1', '81', 'hjbjhvh', '2017-12-12 13:22:12', '0', null, null);
INSERT INTO `message` VALUES ('48', '1', '0', '', '0000-00-00 00:00:00', null, null, null);
INSERT INTO `message` VALUES ('49', '1', '0', '第三方撒地方', '0000-00-00 00:00:00', null, null, null);
INSERT INTO `message` VALUES ('50', '0', '0', '看见了客人介绍了', '2017-12-12 17:20:46', '3', null, null);
INSERT INTO `message` VALUES ('51', '0', '0', '看见了客人介绍了', '2017-12-12 17:22:51', null, null, '3');
INSERT INTO `message` VALUES ('52', '0', '0', '说的vcsd', '2017-12-12 17:29:10', null, null, '21');
INSERT INTO `message` VALUES ('53', '0', '0', '时东方独立思考级发', '2017-12-12 17:39:07', '22', null, '1');
INSERT INTO `message` VALUES ('54', '1', '85', 'kdflskadjflk sad', '2017-12-13 16:11:16', '0', null, null);
INSERT INTO `message` VALUES ('55', '1', '80', 'hjxjvckjsakjchSDKJfh sd', '2017-12-13 16:19:57', '0', null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nav
-- ----------------------------
INSERT INTO `nav` VALUES ('1', '1', '首页', '/home/index');
INSERT INTO `nav` VALUES ('2', '3', '我的鱼塘', '/home/fshop');
INSERT INTO `nav` VALUES ('3', '4', '开通鱼塘', '/home/sfshop');
INSERT INTO `nav` VALUES ('4', '6', '购物车', '/home/cart');
INSERT INTO `nav` VALUES ('6', '5', '我的信息', '我的信息');
INSERT INTO `nav` VALUES ('7', '2', '小店商品', '/home/goods/list');

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
INSERT INTO `order` VALUES ('15127240515a2a5653', '19.90', '1', '0', '', '2', '2017-12-08 09:07:31', '', '', '', '货到付款');
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
INSERT INTO `order` VALUES ('15131815285a315158', '24553.00', '4', '0', '河南省平顶山市鲁山县略略略', '1', '2017-12-13 04:12:08', '15704619282', '宋先生', '', '支付宝');
INSERT INTO `order` VALUES ('15132221215a31efe9', '2016684.00', '3', '0', '河北省石家庄市晋州市村', '1', '2017-12-14 03:28:41', '18333600013', '刘宝根', '', '货到付款');
INSERT INTO `order` VALUES ('15132221535a31f009', '2016684.00', '3', '0', '河北省石家庄市晋州市村', '1', '2017-12-14 03:29:13', '18333600013', '刘宝根', '', '货到付款');
INSERT INTO `order` VALUES ('15132300655a320ef1', '2.00', '1', '0', '北京市北京市东城区天安门1号', '1', '2017-12-14 05:41:05', '18888888888', '毛主席', '', '货到付款');
INSERT INTO `order` VALUES ('15132392975a323301', '22331.00', '3', '0', '江西省上饶市鄱阳县默认地址', '1', '2017-12-14 08:14:57', '122222222', '刘宝根', '1231231', '银行卡');
INSERT INTO `order` VALUES ('15132404055a323755', '22231.00', '2', '0', '江西省上饶市鄱阳县默认地址', '1', '2017-12-14 08:33:25', '122222222', '刘宝根', '阿萨德', '银行卡');
INSERT INTO `order` VALUES ('15132404785a32379e', '22231.00', '2', '0', '江西省上饶市鄱阳县默认地址', '1', '2017-12-14 08:34:38', '122222222', '刘宝根', '123', '货到付款');
INSERT INTO `order` VALUES ('15132405275a3237cf', '22231.00', '2', '0', '江西省上饶市鄱阳县默认地址', '1', '2017-12-14 08:35:27', '122222222', '刘宝根', '', '货到付款');
INSERT INTO `order` VALUES ('15132405675a3237f7', '22231.00', '2', '0', '江西省上饶市鄱阳县默认地址', '1', '2017-12-14 08:36:07', '122222222', '刘宝根', '', '货到付款');
INSERT INTO `order` VALUES ('15132406625a323856', '22231.00', '2', '0', '江西省上饶市鄱阳县默认地址', '1', '2017-12-14 08:37:42', '122222222', '刘宝根', '', '货到付款');
INSERT INTO `order` VALUES ('15132406955a323877', '22231.00', '2', '0', '江西省上饶市鄱阳县默认地址', '1', '2017-12-14 08:38:16', '122222222', '刘宝根', '', '货到付款');
INSERT INTO `order` VALUES ('15132407575a3238b5', '22231.00', '2', '0', '江西省上饶市鄱阳县默认地址', '1', '2017-12-14 08:39:17', '122222222', '刘宝根', '', '货到付款');
INSERT INTO `order` VALUES ('15132408135a3238ed', '2.00', '1', '0', '江西省上饶市鄱阳县默认地址', '1', '2017-12-14 08:40:13', '122222222', '刘宝根', '', '货到付款');
INSERT INTO `order` VALUES ('15132408265a3238fa', '2.00', '1', '0', '江西省上饶市鄱阳县默认地址', '1', '2017-12-14 08:40:26', '122222222', '刘宝根', '', '货到付款');
INSERT INTO `order` VALUES ('15132408565a323918', '2224.00', '2', '0', '江西省上饶市鄱阳县默认地址', '1', '2017-12-14 08:40:56', '122222222', '刘宝根', '', '货到付款');
INSERT INTO `order` VALUES ('15132408955a32393f', '2224.00', '2', '0', '江西省上饶市鄱阳县默认地址', '1', '2017-12-14 08:41:35', '122222222', '刘宝根', '', '货到付款');
INSERT INTO `order` VALUES ('15132409515a323977', '2224.00', '2', '0', '江西省上饶市鄱阳县默认地址', '1', '2017-12-14 08:42:31', '122222222', '刘宝根', '', '货到付款');
INSERT INTO `order` VALUES ('15132411315a323a2b', '2222.00', '1', '0', '江西省上饶市鄱阳县默认地址', '1', '2017-12-14 08:45:31', '122222222', '刘宝根', '', '货到付款');
INSERT INTO `order` VALUES ('15132411615a323a49', '2222.00', '1', '0', '江西省上饶市鄱阳县默认地址', '1', '2017-12-14 08:46:01', '122222222', '刘宝根', '', '货到付款');
INSERT INTO `order` VALUES ('15132412075a323a77', '2222.00', '1', '0', '江西省上饶市鄱阳县默认地址', '1', '2017-12-14 08:46:47', '122222222', '刘宝根', '', '货到付款');
INSERT INTO `order` VALUES ('15132413445a323b00', '2222.00', '1', '0', '江西省上饶市鄱阳县默认地址', '1', '2017-12-14 08:49:04', '122222222', '刘宝根', '', '货到付款');
INSERT INTO `order` VALUES ('15132413675a323b17', '2222.00', '1', '0', '江西省上饶市鄱阳县默认地址', '1', '2017-12-14 08:49:27', '122222222', '刘宝根', '', '货到付款');
INSERT INTO `order` VALUES ('15132414095a323b41', '0.00', '0', '0', '江西省上饶市鄱阳县默认地址', '1', '2017-12-14 08:50:09', '122222222', '刘宝根', '', '货到付款');
INSERT INTO `order` VALUES ('15132414255a323b51', '0.00', '0', '0', '江西省上饶市鄱阳县默认地址', '1', '2017-12-14 08:50:25', '122222222', '刘宝根', '', '货到付款');
INSERT INTO `order` VALUES ('15132414485a323b68', '2222.00', '1', '0', '江西省上饶市鄱阳县默认地址', '1', '2017-12-14 08:50:48', '122222222', '刘宝根', '', '货到付款');
INSERT INTO `order` VALUES ('15132414895a323b91', '0.00', '0', '0', '江西省上饶市鄱阳县默认地址', '1', '2017-12-14 08:51:29', '122222222', '刘宝根', '', '货到付款');
INSERT INTO `order` VALUES ('15132415375a323bc1', '10000.00', '1', '0', '江西省上饶市鄱阳县默认地址', '1', '2017-12-14 08:52:17', '122222222', '刘宝根', '', '货到付款');
INSERT INTO `order` VALUES ('15132419705a323d72', '4454.00', '3', '0', '北京市北京市东城区天安门1号', '1', '2017-12-14 08:59:31', '18888888888', '毛主席', '哒哒哒哒哒', '银行卡');
INSERT INTO `order` VALUES ('15132420345a323db2', '2222.00', '1', '0', '河南省信阳市新县啊啊', '1', '2017-12-14 09:00:34', '1231231212', '啊啊', '', '货到付款');
INSERT INTO `order` VALUES ('15132421555a323e2b', '10002.00', '1', '0', '江西省上饶市鄱阳县默认地址', '1', '2017-12-14 09:02:35', '122222222', '刘宝根', '', '货到付款');
INSERT INTO `order` VALUES ('15132452915a324a6b', '121213.00', '10', '0', '江西省上饶市鄱阳县默认地址', '1', '2017-12-14 09:54:51', '122222222', '刘宝根', '', '货到付款');

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
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
INSERT INTO `orderdetail` VALUES ('51', '15131815285a315158', '25', '100.00', '2');
INSERT INTO `orderdetail` VALUES ('52', '15131815285a315158', '90', '9999.99', '1');
INSERT INTO `orderdetail` VALUES ('53', '15131815285a315158', '85', '2222.00', '1');
INSERT INTO `orderdetail` VALUES ('54', '15132221215a31efe9', '90', '9999.99', '1');
INSERT INTO `orderdetail` VALUES ('55', '15132221215a31efe9', '80', '2222.00', '1');
INSERT INTO `orderdetail` VALUES ('56', '15132221215a31efe9', '47', '9999.99', '1');
INSERT INTO `orderdetail` VALUES ('57', '15132221535a31f009', '90', '9999.99', '1');
INSERT INTO `orderdetail` VALUES ('58', '15132221535a31f009', '80', '2222.00', '1');
INSERT INTO `orderdetail` VALUES ('59', '15132221535a31f009', '47', '9999.99', '1');
INSERT INTO `orderdetail` VALUES ('60', '15132300655a320ef1', '89', '2.00', '1');
INSERT INTO `orderdetail` VALUES ('61', '15132392975a323301', '90', '9999.99', '2');
INSERT INTO `orderdetail` VALUES ('62', '15132392975a323301', '38', '100.00', '1');
INSERT INTO `orderdetail` VALUES ('63', '15132404055a323755', '90', '9999.99', '2');
INSERT INTO `orderdetail` VALUES ('64', '15132404785a32379e', '90', '9999.99', '2');
INSERT INTO `orderdetail` VALUES ('65', '15132405275a3237cf', '90', '9999.99', '2');
INSERT INTO `orderdetail` VALUES ('66', '15132405675a3237f7', '90', '9999.99', '2');
INSERT INTO `orderdetail` VALUES ('67', '15132406625a323856', '90', '9999.99', '2');
INSERT INTO `orderdetail` VALUES ('68', '15132406955a323877', '90', '9999.99', '2');
INSERT INTO `orderdetail` VALUES ('69', '15132407575a3238b5', '90', '9999.99', '2');
INSERT INTO `orderdetail` VALUES ('70', '15132408135a3238ed', '89', '2.00', '1');
INSERT INTO `orderdetail` VALUES ('71', '15132408265a3238fa', '89', '2.00', '1');
INSERT INTO `orderdetail` VALUES ('72', '15132408565a323918', '89', '2.00', '1');
INSERT INTO `orderdetail` VALUES ('73', '15132408565a323918', '80', '2222.00', '1');
INSERT INTO `orderdetail` VALUES ('74', '15132408955a32393f', '89', '2.00', '1');
INSERT INTO `orderdetail` VALUES ('75', '15132408955a32393f', '80', '2222.00', '1');
INSERT INTO `orderdetail` VALUES ('76', '15132409515a323977', '89', '2.00', '1');
INSERT INTO `orderdetail` VALUES ('77', '15132409515a323977', '80', '2222.00', '1');
INSERT INTO `orderdetail` VALUES ('78', '15132411315a323a2b', '80', '2222.00', '1');
INSERT INTO `orderdetail` VALUES ('79', '15132411615a323a49', '80', '2222.00', '1');
INSERT INTO `orderdetail` VALUES ('80', '15132412075a323a77', '80', '2222.00', '1');
INSERT INTO `orderdetail` VALUES ('81', '15132413445a323b00', '80', '2222.00', '1');
INSERT INTO `orderdetail` VALUES ('82', '15132413675a323b17', '80', '2222.00', '1');
INSERT INTO `orderdetail` VALUES ('83', '15132414485a323b68', '80', '2222.00', '1');
INSERT INTO `orderdetail` VALUES ('84', '15132415375a323bc1', '77', '9999.99', '1');
INSERT INTO `orderdetail` VALUES ('85', '15132419705a323d72', '80', '2222.00', '1');
INSERT INTO `orderdetail` VALUES ('86', '15132419705a323d72', '85', '2222.00', '1');
INSERT INTO `orderdetail` VALUES ('87', '15132419705a323d72', '75', '10.00', '1');
INSERT INTO `orderdetail` VALUES ('88', '15132420345a323db2', '80', '2222.00', '1');
INSERT INTO `orderdetail` VALUES ('89', '15132421555a323e2b', '31', '9999.99', '1');
INSERT INTO `orderdetail` VALUES ('90', '15132452915a324a6b', '55', '9999.99', '1');
INSERT INTO `orderdetail` VALUES ('91', '15132452915a324a6b', '35', '100.00', '7');
INSERT INTO `orderdetail` VALUES ('92', '15132452915a324a6b', '31', '9999.99', '2');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', '增加轮播图', '/admin/ad/lunbotu');
INSERT INTO `permissions` VALUES ('2', '删除轮播图', '/admin/ad/lunbotushanchu');
INSERT INTO `permissions` VALUES ('3', '修改轮播图', '/admin/ad/lunbotuxiugai');

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
INSERT INTO `role_permission` VALUES ('1', '1');
INSERT INTO `role_permission` VALUES ('1', '2');
INSERT INTO `role_permission` VALUES ('1', '3');
INSERT INTO `role_permission` VALUES ('1', '4');
INSERT INTO `role_permission` VALUES ('4', '1');
INSERT INTO `role_permission` VALUES ('4', '4');

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
INSERT INTO `role_user` VALUES ('1', '4');

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
