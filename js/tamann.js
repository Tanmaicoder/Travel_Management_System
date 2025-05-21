
    function subscribe() {
        var email = document.getElementById('emailInput').value;

        // Check if the email is not empty
        if (email.trim() !== '') {
            // Send the email to the server using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "subscribe.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Show the modal
                    document.getElementById('customSubscriptionModal').style.display = 'block';
                    document.getElementById('modalOverlay').style.display = 'block';

                    // Update the subscriber count
                    updateSubscriberCount();
                }
            };
            xhr.send("email=" + email);
        }
    }
    function closeCustomModal() {
        // Close the modal
        document.getElementById('customSubscriptionModal').style.display = 'none';
        document.getElementById('modalOverlay').style.display = 'none';
    }

    function updateSubscriberCount() {
        // Fetch the subscriber count from the server using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "get_subscriber_count.php", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Update the subscriber count on the page
                var subscriberCount = parseInt(xhr.responseText);
                var subscriberText = (subscriberCount === 1) ? 'Subscriber' : 'Subscribers';
                document.getElementById('subscriberCount').innerHTML = subscriberCount + '<br> <h6>' + subscriberText + '</h6>';
            }
        };
        xhr.send();
    }

    // Call the updateSubscriberCount function initially to display the initial count
    updateSubscriberCount();
     // Function to open the modal
 function openModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = "block";
}

// Function to close the modal
function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = "none";
}

// Event listener for opening and closing modals
document.getElementById("openModal").addEventListener("click", function() {
    openModal("myModal");
});

document.getElementsByClassName("close")[0].addEventListener("click", function() {
    closeModal("myModal");
});

document.getElementById("openModalSingapore").addEventListener("click", function() {
    openModal("myModalSingapore");
});

document.getElementsByClassName("close")[1].addEventListener("click", function() {
    closeModal("myModalSingapore");
});

document.getElementById("openModalSwitzerland").addEventListener("click", function() {
    openModal("myModalSwitzerland");
});

document.getElementById("myModalSwitzerland").getElementsByClassName("close")[0].addEventListener("click", function() {
    closeModal("myModalSwitzerland");
});

document.getElementById("openModalAustralia").addEventListener("click", function() {
    openModal("myModalAustralia");
});

document.getElementById("myModalAustralia").getElementsByClassName("close")[0].addEventListener("click", function() {
    closeModal("myModalAustralia");
});

// Close the modal when the background is clicked
window.onclick = function(event) {
    if (event.target.classList.contains("modal")) {
        closeModal("myModal");
        closeModal("myModalSingapore");
        closeModal("myModalSwitzerland");
        closeModal("myModalAustralia");
    }
}
 
