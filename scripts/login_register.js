const email = document.getElementById('email');
email.addEventListener('change', (event) => {
    const emailValue = email.value;
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,5}$/;
    if (emailRegex.test(emailValue)) {
        event.target.setCustomValidity('')
    } else {
        event.target.setCustomValidity('Please enter a valid email')
    }
});

const firstName = document.getElementById('Fname');

firstName.addEventListener('change', (event) => {
    const firstNameValue = firstName.value;
    const firstNameRegex = /^[A-Za-z\-]+$/;
    if (firstNameRegex.test(firstNameValue)) {
        event.target.setCustomValidity('')
    } else {
        event.target.setCustomValidity('Please enter a valid first name')
    }
});

const lastName = document.getElementById('Lname');
lastName.addEventListener('change', (event) => {
    const lastNameValue = lastName.value;
    const lastNameRegex = /^[A-Za-z\-]+$/;
    if (lastNameRegex.test(lastNameValue)) {
        event.target.setCustomValidity('')
    } else {
        event.target.setCustomValidity('Please enter a valid first name')
    }
});