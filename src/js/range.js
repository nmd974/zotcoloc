var sliderRent = document.getElementById("price-range");
var outputRent = document.getElementById("price-value");

var sliderRentTwo = document.getElementById("price-range2");
var outputRentTwo = document.getElementById("price-value2");

var slider = document.getElementById("availability-range");
var output = document.getElementById("availability-value");

var sliderTwo = document.getElementById("availability-range2");
var outputTwo = document.getElementById("availability-value2");

outputRent.innerHTML = sliderRent.value;
sliderRent.oninput = function() {
outputRent.innerHTML = this.value;
}


output.innerHTML = slider.value;
slider.oninput = function() {
output.innerHTML = this.value;
}

outputRentTwo.innerHTML = sliderRentTwo.value;
sliderRentTwo.oninput = function() {
outputRentTwo.innerHTML = this.value;
}

outputTwo.innerHTML = sliderTwo.value;
sliderTwo.oninput = function() {
outputTwo.innerHTML = this.value;
}