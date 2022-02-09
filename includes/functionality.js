function EnableRaceOne(check) {
  var input = document.getElementById("race1")
  input.disabled = check.checked ? false : true
  if (!input.disabled) {
    input.focus()
  }
}

function EnableRaceTwo(check) {
  var input = document.getElementById("race2")
  input.disabled = check.checked ? false : true
  if (!input.disabled) {
    input.focus()
  }
}

function EnableRaceThree(check) {
  var input = document.getElementById("race3")
  input.disabled = check.checked ? false : true
  if (!input.disabled) {
    input.focus()
  }
}

function EnableRaceFour(check) {
  var input = document.getElementById("race4")
  input.disabled = check.checked ? false : true
  if (!input.disabled) {
    input.focus()
  }
}