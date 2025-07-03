document.addEventListener("DOMContentLoaded", function () {
  const toggle = document.getElementById("visibilityToggle");
  const label = document.getElementById("visibilityLabel");

  toggle.addEventListener("change", function () {
    fetch("/profile/visibility", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      // Optional: include CSRF token if needed
    },
    body: JSON.stringify({ visible: this.checked })
  })
  .then(response => {
    if (!response.ok) throw new Error("Request failed");
    return response.json();
  })
  .then(data => {
    console.log("Success:", data);
    if (data && data.visibility) 
    {
        label.textContent = data.visibility;
    } else {
        label.textContent = "Unknown"
    }
  })
  .catch(error => {
    console.error("Error:", error);
  });

  
});
});