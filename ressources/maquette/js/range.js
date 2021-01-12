var sliderRent = document.getElementById("price-range");
var outputRent = document.getElementById("price-value");
outputRent.innerHTML = sliderRent.value;
sliderRent.oninput = function() {
outputRent.innerHTML = this.value;
}

var slider = document.getElementById("availability-range");
var output = document.getElementById("availability-value");
output.innerHTML = slider.value;
slider.oninput = function() {
output.innerHTML = this.value;
}