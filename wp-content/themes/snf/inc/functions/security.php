<?php
/**
 * ẩn text lấy lại mật khẩu
 *
 * @author hien-tech (hiennd@ancu.com)
 * @since 2019-05-29
 */
function remove_lostpassword_text($text) {
	if ($text == 'Lost your password?') $text = '';
	return $text;
}
add_filter('gettext', 'remove_lostpassword_text');

/**
 * không cho phép lấy lại mật khẩu
 *
 * @author hien-tech (hiennd@ancu.com)
 * @since 2019-05-29
 */
function disable_password_reset() {
	return false;
}
add_filter('allow_password_reset', 'disable_password_reset');
