function countHandshake(n) {
  var count = 0
  for (var i = 1; i <= n; i++) {
    for (var j = i+1; j <= n; j++) {
		    count += 1
    }
  }
  console.log(count);
}

countHandshake(4)
