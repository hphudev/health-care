/* Vietnamese initialisation for the jQuery UI date picker plugin. */
/* Translated by Le Thanh Huy (lthanhhuy@cit.ctu.edu.vn). */
 
jQuery(function($){
	$.datepicker.regional['vi'] = {
		closeText: 'Đóng',
		prevText: '&#x3c;Trước', prevStatus: '',
		nextText: 'Tiếp&#x3e;', nextStatus: '',
		currentText: 'Hôm nay', currentStatus: '',
		monthNames: ['Tháng Một', 'Tháng Hai', 'Tháng Ba', 'Tháng Tư', 'Tháng Năm', 'Tháng Sáu',
                'Tháng Bảy', 'Tháng Tám', 'Tháng Chín', 'Tháng Mười', 'Tháng Mười Một', 'Tháng Mười Hai'],
		monthNamesShort: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
		dayNames: ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'],
		dayNamesShort: ['CN', 'Hai', 'Ba', 'Tư', 'Năm', 'Sáu', 'Bảy'],
		dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
		weekHeader: 'Bảy',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['vi']);
	// $.datepicker.regional["vi-VN"] =
	// {
	// 	closeText: "Đóng",
	// 	prevText: "Trước",
	// 	nextText: "Sau",
	// 	currentText: "Hôm nay",
	// 	monthNames: ["Tháng một", "Tháng hai", "Tháng ba", "Tháng tư", "Tháng năm", "Tháng sáu", "Tháng bảy", "Tháng tám", "Tháng chín", "Tháng mười", "Tháng mười một", "Tháng mười hai"],
	// 	monthNamesShort: ["Một", "Hai", "Ba", "Bốn", "Năm", "Sáu", "Bảy", "Tám", "Chín", "Mười", "Mười một", "Mười hai"],
	// 	dayNames: ["Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy"],
	// 	dayNamesShort: ["CN", "Hai", "Ba", "Tư", "Năm", "Sáu", "Bảy"],
	// 	dayNamesMin: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
	// 	weekHeader: "Tuần",
	// 	dateFormat: "dd/mm/yy",
	// 	firstDay: 1,
	// 	isRTL: false,
	// 	showMonthAfterYear: false,
	// 	yearSuffix: ""
	// };

	// $.datepicker.setDefaults($.datepicker.regional["vi-VN"]);
});
