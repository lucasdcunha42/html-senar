document.addEventListener('DOMContentLoaded', function () {
    const acceptCookiesButton = document.getElementById('accept-cookies');
    const rejectCookiesButton = document.getElementById('reject-cookies');
    const cookieBanner = document.getElementById('cookie-banner');

    if (acceptCookiesButton && rejectCookiesButton && cookieBanner) {
        // Verifica se o usuário já aceitou ou recusou os cookies anteriormente (por meio de um cookie)
        const cookiesAccepted = localStorage.getItem('cookiesAccepted');
        const cookiesRejected = localStorage.getItem('cookiesRejected');

        if (!cookiesAccepted && !cookiesRejected) {
            // Se os cookies ainda não foram aceitos nem recusados, exibe a mensagem
            cookieBanner.style.display = 'block';
        }

        acceptCookiesButton.addEventListener('click', function () {
            // Oculta a mensagem e define um cookie de aceitação de cookies
            cookieBanner.style.display = 'none';
            localStorage.setItem('cookiesAccepted', 'true');
        });

        rejectCookiesButton.addEventListener('click', function () {
            // Oculta a mensagem e define um cookie de recusa de cookies
            cookieBanner.style.display = 'none';
            localStorage.setItem('cookiesRejected', 'true');
        });
    }
});
