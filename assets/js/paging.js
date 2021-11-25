
document.querySelector("#pg_next").onclick = function() {
	document.querySelector("#page_no").value = document.querySelector("#pg_next").value;
};
document.querySelector("#pg_prev").onclick = function() {
	document.querySelector("#page_no").value = document.querySelector("#pg_prev").value;
};

document.querySelector("#btn_add").onclick = function() {
	document.querySelector("#win_add").style.display = "block";
};
document.querySelector("#win_add_close").onclick = function() {
	document.querySelector("#win_add").style.display = "none";
};

var del_buttons = document.querySelectorAll(".btn_delete");
for (var i = del_buttons.length - 1; i >= 0; i--) {
	del_buttons[i].onclick = function() {
		document.querySelector("#win_delete").style.display = "block";
		document.querySelector("#delete_id").textContent = this.value;
		document.querySelector("#delete_inp_id").value = this.value;
	};
}
document.querySelector("#win_delete_close").onclick = function() {
	document.querySelector("#win_delete").style.display = "none";
};

document.querySelector("#btn_print").onclick = function() {
	window.print();
};