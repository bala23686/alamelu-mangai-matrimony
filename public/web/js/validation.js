/**
 * THE FOLLOWING PROGRAM CONTAINS INPUT FORM VALIDATION.
 * THE USER WHEN FILLING INPUT FIELDS IN FORM, THIS PROGRAM
 * VALIDATE THEIR INFORMATION IS CORRECT OR NOT.
 */

// HOME-REGISTER FORM VALUES
const usernameEl = document.querySelector("#username");
const mobileEl = document.querySelector("#phonenumber");
const emailEl = document.querySelector("#email");
const passwordEl = document.querySelector("#password");
const confirm_passwordEl = document.querySelector("#confirm_password");
const genderEl = document.querySelector("#gender");
const dobEl = document.querySelector("#dob");
const religionEl = document.querySelector("#religion");
const casteEl = document.querySelector("#caste");
const termsEl = document.querySelector("#terms");
const vegEl = document.querySelector("#veg");
const teetotalerEl = document.querySelector("#teetotaler");
const userRegisterEl = document.querySelector("#userRegister");
const registerFormEl = document.querySelector("#registerForm");
// HOME-REGISTER FORM VALUES

// HOME-SEARCH FORM VALUES

// RESTRICT USER INPUT
if (usernameEl != null && usernameEl != "") {
    usernameEl.addEventListener("input", function (e) {
        return (this.value = this.value
            .replace(/[^a-z A-z.]/g, "")
            .replace(/(\..*?)\..*/g, "$1"));
    });
}

if (mobileEl != null && mobileEl != "") {
    mobileEl.addEventListener("input", function () {
        return (this.value = this.value
            .replace(/[^0-9.]/g, "")
            .replace(/(\..*?)\..*/g, "$1"));
    });
}
// RESTRICT USER INPUT

// REGEX
const isEmailValid = (email) => {
    let regex =
        /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regex.test(email);
};

const isPasswordSecure = (password) => {
    let regex = new RegExp(
        "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})"
    );
    return regex.test(password);
};

const isNameValid = (username) => {
    let regex = /^[a-zA-Z ]*$/;
    return regex.test(username);
};
// REGEX

const isRequired = (value) => (value === "" ? false : true);
const isBetween = (length, min, max) =>
    length < min || length > max ? false : true;

const checkUsername = () => {
    let valid = false;

    const min = 3,
        max = 25;

    const username = usernameEl.value.trim();

    if (!isRequired(username)) {
        showError(usernameEl, "Username cannot be blank.");
    } else if (!isBetween(username.length, min, max)) {
        showError(
            usernameEl,
            `Username must be between ${min} and ${max} characters.`
        );
    } else {
        showSuccess(usernameEl);
        valid = true;
    }
    return valid;
};

const checkMobile = () => {
    let valid = false;
    const mobile = mobileEl.value.trim();
    if (!isRequired(mobile)) {
        showError(mobileEl, "Mobile Number cannot be blank.");
    } else if (mobile.length < 10) {
        showError(mobileEl, "Mobile Number Must be 10 Characters.");
    } else {
        showSuccess(mobileEl);
        valid = true;
    }
    return valid;
};

const checkEmail = () => {
    let valid = false;
    const email = emailEl.value.trim();
    if (!isRequired(email)) {
        showError(emailEl, "Email cannot be blank.");
    } else if (!isEmailValid(email)) {
        showError(emailEl, "Email is not valid.");
    } else {
        showSuccess(emailEl);
        valid = true;
    }
    return valid;
};

const checkPassword = () => {
    let valid = false;
    const password = passwordEl.value.trim();
    if (!isRequired(password)) {
        showError(passwordEl, "Password cannot be blank.");
    } else if (password.length < 8) {
        showError(passwordEl, "Password must has at least 8 characters");
    } else {
        showSuccess(passwordEl);
        valid = true;
    }
    return valid;
};

const checkConfirmPassword = () => {
    let valid = false;
    const password = passwordEl.value.trim();
    const confirm_password = confirm_passwordEl.value.trim();
    if (password === "") {
        showError(confirm_passwordEl, "Password Field is Empty !");
    } else if (!isRequired(confirm_password)) {
        showError(confirm_passwordEl, "Password cannot be blank !");
    } else if (password !== confirm_password) {
        showError(confirm_passwordEl, "Password Doesn't Match");
    } else {
        showSuccess(confirm_passwordEl);
        valid = true;
    }
    return valid;
};

const checkDob = () => {
    let valid = false;
    const dob = dobEl.value.trim();
    if (!isRequired(dob)) {
        showError(dobEl, "Date of Birth is Required");
    } else {
        showSuccess(dobEl);
        valid = true;
    }
    return valid;
};

const checkGender = () => {
    let valid = false;
    const gender = genderEl.value.trim();
    if (!isRequired(gender)) {
        showError(genderEl, "Gender is Required");
    } else {
        showSuccess(genderEl);
        valid = true;
    }
    return valid;
};

const checkReligion = () => {
    let valid = false;
    const religion = religionEl.value.trim();
    if (!isRequired(religion)) {
        showError(religionEl, "Religion is Required");
    } else {
        showSuccess(religionEl);
        valid = true;
    }
    return valid;
};

const checkCaste = () => {
    let valid = false;
    const caste = casteEl.value.trim();
    if (!isRequired(caste)) {
        showError(casteEl, "Caste is Required");
    } else {
        showSuccess(casteEl);
        valid = true;
    }
    return valid;
};
const checkVeg = () => {
    let valid = false;
    if (vegEl.checked) {
        valid = true;
    } else {
        valid = false;
    }
    return valid;
};
const checkTeetotaler = () => {
    let valid = false;

    if (teetotalerEl.checked) {
        valid = true;
    } else {
        valid = false;
    }
    return valid;
};

const checkTouched = (event) => {
    let valid = false;
    switch (event) {
        case "username":
            checkUsername();
            break;
        case "phonenumber":
            checkMobile();
            break;
        case "email":
            checkEmail();
            break;
        case "password":
            checkPassword();
            break;
        case "confirm_password":
            checkConfirmPassword();
            break;
        case "gender":
            checkGender();
            break;
        case "dob":
            checkDob();
            break;
        case "religion":
            checkReligion();
            break;
        case "caste":
            checkCaste();
            break;
        case "veg":
            checkVeg();
            break;
        case "teetotaler":
            checkTeetotaler();
            break;
        default:
    }
    return valid;
};

const showError = (input, message) => {
    // GET THE FORM-FIELD ELEMENT
    const formField = input.parentElement;
    const formFields = input.parentElement.childNodes[1];

    // ADD THE ERROR CLASS
    formFields.classList.remove("text-success");
    formFields.classList.add("text-danger");

    // SHOW THE ERROR MESSAGE
    const error = formField.querySelector("small");
    error.textContent = message;
};

const showSuccess = (input) => {
    // GET THE FORM-FIELD ELEMENT
    const formField = input.parentElement;
    const formFields = input.parentElement.childNodes[1];

    // REMOVE THE ERROR CLASS
    formFields.classList.remove("text-danger");
    formFields.classList.add("text-success");

    // HIDE THE ERROR MESSAGE
    const error = formField.querySelector("small");
    error.textContent = "";
};

const debounce = (fn, delay = 200) => {
    let timeoutId;
    return (...args) => {
        // CANCEL THE PREVIOUS TIMER
        if (timeoutId) {
            clearTimeout(timeoutId);
        }
        // SETUP A NEW TIMER
        timeoutId = setTimeout(() => {
            fn.apply(null, args);
        }, delay);
    };
};

registerFormEl &&
    registerFormEl.addEventListener(
        "input",
        debounce(function (e) {
            switch (e.target.id) {
                // REGISTER FORM
                case "username":
                    checkUsername();
                    break;
                case "phonenumber":
                    checkMobile();
                    break;
                case "email":
                    checkEmail();
                    break;
                case "password":
                    checkPassword();
                    break;
                case "confirm_password":
                    checkConfirmPassword();
                    break;
                case "dob":
                    checkDob();
                    break;
                case "gender":
                    checkGender();
                    break;
                case "religion":
                    checkReligion();
                    break;
                case "caste":
                    checkCaste();
                    break;
                case "veg":
                    checkVeg();
                    break;
                case "teetotaler":
                    checkTeetotaler();
                    break;
                default:
            }
        })
    );

[genderEl, dobEl, casteEl, religionEl].forEach((element) => {
    element && element.addEventListener("blur", checkTouched);
});

const validate = () => {
    // VALIDATE FIELDS
    let isUsernameValid = checkUsername(),
        isMobileValid = checkMobile(),
        isEmailValid = checkEmail(),
        isPasswordValid = checkPassword(),
        isConfirmPasswordValid = checkConfirmPassword(),
        isDobValid = checkDob(),
        isGenderValid = checkGender(),
        isReligionValid = checkReligion(),
        isCasteValid = checkCaste(),
        isVegetarian = checkVeg(),
        isTeetotaler = checkTeetotaler();
    // isTouched = checkTouched();
    console.log(isVegetarian);
    console.log(isTeetotaler);

    let isFormValid =
        isUsernameValid &&
        isMobileValid &&
        isEmailValid &&
        isPasswordValid &&
        isConfirmPasswordValid &&
        isDobValid &&
        isGenderValid &&
        isReligionValid &&
        isCasteValid &&
        isVegetarian &&
        isTeetotaler;

    // && isTouched;
    return isFormValid;
};

let formValid;

termsEl &&
    termsEl.addEventListener("click", () => {
        formValid = validate();
        console.log(formValid);
        if (formValid) {
            termsEl.checked
                ? userRegisterEl.removeAttribute("disabled", true)
                : userRegisterEl.setAttribute("disabled", true);
        }
    });

document.addEventListener("click", function (e) {
    if (e.target.id == "veg" || e.target.id == "teetotaler") {
        if (vegEl.checked && teetotalerEl.checked && termsEl.checked) {
            userRegisterEl.removeAttribute("disabled", true);
        } else {
            userRegisterEl.setAttribute("disabled", true);
        }
    }
});

function formSubmit() {
    console.log(formValid);
    if (formValid) {
        document.getElementById("userRegister").disabled = false;
    }
    document.getElementById("registerForm").submit();
}
