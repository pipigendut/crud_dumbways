function cekEmail(email) {
  if (email == email.toLowerCase() && email.includes("@")) {
   console.log("Valid")
  } else {
   console.log("Invalid")
  }
}

function cekUsername(username) {
  if (username == username.toLowerCase() && username.length >= 8) {
   console.log("Valid")
  } else {
   console.log("Invalid")
  }
}

cekEmail("kukuruyuk@gmail.com")

cekUsername("Vladimir")
