document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('[data-toggle-active-at-load="true"]').forEach(function (el) {
        el.classList.add('active');
    });

    function toggleActive(element, toggleId) {
        var toggleCategory = element.getAttribute('data-toggle-category');
        var toggleRepeat = element.getAttribute('data-toggle-repeat');
        var selfClose = element.getAttribute('data-toggle-self-close') === 'true';
        var isActive = element.classList.contains('active');
        var isToggler = element.getAttribute('data-toggle-type') === 'toggler';

        document.querySelectorAll('[data-toggle-category="' + toggleCategory + '"]').forEach(function (el) {
            if (el.getAttribute('data-toggle-id') !== toggleId) {
                el.classList.remove('active');
            }
        });

        if (selfClose && isActive) {
            element.classList.remove('active');
            var relatedElement = document.querySelector('[data-toggle-type="' + (isToggler ? 'target' : 'toggler') + '"][data-toggle-id="' + toggleId + '"]');
            if (relatedElement) {
                relatedElement.classList.remove('active');
            }
        } else if (toggleRepeat === 'yes' || !isActive) {
            element.classList.toggle('active');
            document.querySelectorAll('[data-toggle-type="' + (isToggler ? 'target' : 'toggler') + '"][data-toggle-id="' + toggleId + '"]').forEach(function (relatedElement) {
                relatedElement.classList.toggle('active', !isActive);
            });
        }
    }

    document.querySelectorAll('[data-toggle-type="toggler"], [data-toggle-type="target"]').forEach(function (element) {
        element.addEventListener('click', function () {
            toggleActive(element, element.getAttribute('data-toggle-id'));
        });
    });
});

// [data-toggle-id] : Służy jako unikalny identyfikator dla elementów przełączników i celów, umożliwiając ich powiązanie.
// [data-toggle-type] : Określa rolę elementu jako przełącznik (toggler) lub cel (target), co wpływa na jego sposób działania w skrypcie.
// [data-toggle-active-at-load] : Określa, czy element powinien być aktywny (np. widoczny) podczas ładowania strony.
// [data-toggle-category] : Umożliwia grupowanie elementów w kategorie, tak aby aktywacja jednego elementu w kategorii dezaktywowała inne.
// [data-toggle-repeat] : Pozwala na ponowną aktywację elementu, nawet jeśli był już wcześniej aktywny.
// [data-toggle-self-close] : Umożliwia elementowi dezaktywację samego siebie.