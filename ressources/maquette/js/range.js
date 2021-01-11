var slider = document.getElementById("price-range");
var output = document.getElementById("price-value");
output.innerHTML = slider.value;
slider.oninput = function() {
output.innerHTML = this.value;
}

var slider = document.getElementById("availability-range");
var output = document.getElementById("availability-value");
output.innerHTML = slider.value;
slider.oninput = function() {
output.innerHTML = this.value;
}