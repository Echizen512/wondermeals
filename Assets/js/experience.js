document.querySelectorAll('.star-rating input').forEach((star) => {
    star.addEventListener('change', function() {
        if (this.value <= 2) {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            document.querySelector('#complaintModal input[name="name"]').value = name;
            document.querySelector('#complaintModal input[name="email"]').value = email;
            document.querySelector('#complaintModal').style.display = 'block';
        }
    });
});

document.querySelector('.close').addEventListener('click', function() {
    document.getElementById('complaintModal').style.display = 'none';
});