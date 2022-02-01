function EnableDisableTextBox(check, race) {
  var input = document.getElementById("'"+race+"'")
  input.disabled = check.checked ? false : true
  if (!input.disabled) {
    input.focus()
  }
}
