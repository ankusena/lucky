document.addEventListener('DOMContentLoaded', function() {
        const nav = document.getElementById('nav-bar');
            let prevScrollpos = window.pageYOffset;

                window.onscroll = function() {
                        let currentScrollPos = window.pageYOffset;
                                if (prevScrollpos > currentScrollPos) {
                                            nav.style.top = "0";
                                                    } else {
                                                                nav.style.top = "-50px";
                                                                        }
                                                                                prevScrollpos = currentScrollPos;
                                                                                    }
                                                                                    });
                                                                                    
})