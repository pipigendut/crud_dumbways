function betweenDays(start, end) {
  var dates = []
      startDate = new Date(start)
      endDate = new Date(end)

  while (startDate <= endDate) {
    dates.push(startDate.toISOString().slice(0,10));
    startDate.setDate(startDate.getDate() + 1);
  }

  console.log(dates);
}

betweenDays("2018-11-01", "2018-11-05")
