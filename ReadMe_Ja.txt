*�͂��߂�
����CodeSamples�́A�l�X�Ȍ���̃T���v���\�[�X�R�[�h���W�ς��A���Ȋw�K�̗ƂƂ��邱�Ƃ�ړI�Ƃ��č\�z���܂����B
�������K�v�Ƃ����@�\�́A
�P�D�\�[�X�R�[�h�̓o�^
�Q�D�\�[�X�R�[�h�̌���
	�^�O�ł̌���
	����ł̌���
	�s�����\��
�R�D�\�[�X�R�[�h�̃V���^�b�N�X�n�C���C�g
�S�D�^�O�T�W�F�X�`����
��4�ł����B

�P�C�Q�͎����ς݂ł��B�����e�X�g�P�[�X����������͂��Ă��Ȃ��̂ŁA�o�O������܂����A
���͒l�`�F�b�N���s���S�ł��B
�R�̃V���^�b�N�X�n�C���C�g��
SyntaxHighlighter�𗘗p���Ă��܂��B
http://alexgorbatchev.com/SyntaxHighlighter/
�S��jQuery�ł̕׋��Ɏ����Ŏ������܂������Asuggest.js
http://www.enjoyxstudy.com/javascript/suggest/
�̂悤�ȊO���̃��C�u�����̕����o�����ǂ��̂ŁA���ꃊ�v���[�X�������ł��B


*����҂ɂ���
�Ɗw�Ńv���O���~���O��׋����Ă��܂��BPHP�̎g�p���͊��ƒ����A���߂ĐG�����̂͐��N�O�ŁAwindows��phpdev����ł����B�u�����N�͂�����A�f���I�Ɏ����ɕK�v�ȃX�N���v�g���������߂ɂ��̓s�x�w�K���ė��܂����B
�I�u�W�F�N�g�w���v���O���~���O�ɂ��Ċw�юn�߂��̂�2010�N������ŁA�������삵�Ă����������Ԃƌ��ς��莞�Ԃ��Ǘ�����S�[���ETodo�Ǘ�Web�A�v���P�[�V�����̐���ɁA�R�[�h�ʂ�3���s�𒴂��������肩����E������������ł��B
�I�u�W�F�N�g�w���ł́A����CodeSamples�����߂Ă̐��앨�ł��B
Git�͍��N�ɓ����Ă���g���n�߂܂����B���݂�TDD���w�΂Ȃ���΂ƍl���Ă��܂��B


*�J����
XAMPP for Windows version 1.7.3���g�p���܂����B
Apache 2.2.14 (IPv6 enabled) + OpenSSL 0.9.8l
MySQL 5.1.41 + PBXT engine
PHP 5.3.1
phpMyAdmin 3.2.4
Perl 5.10.1
FileZilla FTP Server 0.9.33
Mercury Mail Transport System 4.72


*�\�[�X�R�[�h��ǂ܂����ւ̒���
�R�����g�͂قږ����Ǝv���ĉ������B�ς݂܂���B
����Form�̕ϐ��́A�f�[�^�x�[�X�̃t�B�[���h���Ƃقڈ�v���Ă��܂����A
����Form�̕ϐ�'tags'�ɑΉ�����t�B�[���h����'specialities'�܂���'spec'�ƂȂ��Ă��܂��B
�f�[�^�x�[�X�̃e�[�u���݌v���������ɂ�'specialities'���ǂ��l���Ɏv�����̂ł��B


*�f�[�^�x�[�X
�o�b�N�G���h�̃f�[�^�x�[�X��MySQL�ł��B
�e�[�u���͉��L��5�ł��B
codes - �T���v���\�[�X�R�[�h��ۑ����܂�
specialities - �^�O��ۑ����܂�
langs - CodeSamples����������̃��X�g�ł�
code_specs - �\�[�X�R�[�h�ƃ^�O��R�t���܂�
lang_specs - ����ƃ^�O��R�t���܂�


CREATE TABLE `codes` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `code` text NOT NULL,
 `description` text NOT NULL,
 `linenum` tinyint(3) unsigned NOT NULL,
 `lang_id` int(10) unsigned NOT NULL,
 `created` datetime NOT NULL,
 `modified` datetime NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1



CREATE TABLE `specialities` (
 `speciality` varchar(64) NOT NULL,
 `id` int(11) NOT NULL AUTO_INCREMENT,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1


CREATE TABLE `langs` (
 `langname` varchar(20) NOT NULL,
 `id` int(11) NOT NULL AUTO_INCREMENT,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18446744073709551615 DEFAULT CHARSET=latin1


CREATE TABLE `code_specs` (
 `code_id` int(10) unsigned NOT NULL,
 `sp_id` int(10) unsigned NOT NULL,
 PRIMARY KEY (`code_id`,`sp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1


CREATE TABLE `lang_specs` (
 `lang_id` int(10) unsigned NOT NULL,
 `sp_id` int(10) unsigned NOT NULL,
 PRIMARY KEY (`lang_id`,`sp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1


*�Ō��
�ǂ�ł��������Ăǂ������肪�Ƃ��������܂��B
���萔�Ŗ�����ΐ���t�B�[�h�o�b�N���������B
