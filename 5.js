function drawLine(n) {
  var sign = 0
  for (var i = 1; i <= n; i++) {
    sign += 1
    for (var j = 1; j <= n; j++) {
      if (sign == j) {
        var arr = Array(n).join(".").split(".");
        arr[j-1] = "*"
        console.log(arr.join("    "))
      }
    }
  }
}

drawLine(5)
