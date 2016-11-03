(function () {
// use custom selector to target elements
// all elements with data-rellax will still be initialized with the new defaults
    $('.rellax').rellax();

// use different settings for just a set of elements
    $('.rellax-fixed').rellax({
        amount: .25,
        container: '.rellax-wrapper'
    });
});