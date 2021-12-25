module.exports = {
    important: true,
    purge: [
        './resources/views/**/*.php',
        './resources/js/components/**/*'
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                primary: 'var(--color-primary)',
                secondary: 'var(--color-secondary)',
                warning: 'var(--color-secondary)',
                info: 'var(--color-info)',
                success: 'var(--color-success)',
                danger: 'var(--color-danger)',
                error: 'var(--color-error)',
                default: 'var(--color-default)',
                cancel: 'var(--color-cancel)',
                "primary-darker": 'var(--color-primary-darker)',
                "primary-lighter": 'var(--color-primary-lighter)',
                "secondary-darker": 'var(--color-secondary-darker)',
                "secondary-lighter": 'var(--color-secondary-lighter)',
            },
            boxShadow: {
                sm: '0 1px 2px 0 rgba(0, 0, 0, 0.05)',
                DEFAULT: '0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06)',
                md: '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
                lg: '0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)',
                xl: '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)',
                '2xl': '0 25px 50px -12px rgba(0, 0, 0, 0.25)',
                '3xl': '0 35px 60px -15px rgba(0, 0, 0, 0.3)',
                'full': '0 0 0 999em rgba(0, 0, 0, 0.5)',
                inner: 'inset 0 2px 4px 0 rgba(0, 0, 0, 0.06)',
                top: '6px 4px 6px -1px rgba(0, 0, 0, 0.1), 4px 2px 4px -1px rgba(0, 0, 0, 0.06)',
                none: 'none',
            },
            keyframes: {
                'fade-in-down': {
                    '0%': {
                        opacity: '0',
                        transform: 'translateY(-10px)'
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateY(0)'
                    },
                },
                'fade-out-down': {
                    'from': {
                        opacity: '1',
                        transform: 'translateY(0px)'
                    },
                    'to': {
                        opacity: '0',
                        transform: 'translateY(10px)'
                    },
                },
                'fade-in-up': {
                    '0%': {
                        opacity: '0',
                        transform: 'translateY(10px)'
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateY(0)'
                    },
                },
                'fade-out-up': {
                    'from': {
                        opacity: '1',
                        transform: 'translateY(0px)'
                    },
                    'to': {
                        opacity: '0',
                        transform: 'translateY(10px)'
                    },
                },
                'fade-in-left': {
                    '0%': {
                        opacity: '0',
                        transform: 'translateX(30px)'
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateX(0)'
                    },
                },
                'fade-out-left': {
                    'from': {
                        opacity: '1',
                        transform: 'translateX(0px)'
                    },
                    'to': {
                        opacity: '0',
                        transform: 'translateX(-30px)'
                    },
                },
            },
            animation: {
                'fade-in-down': 'fade-in-down 0.25s ease-out',
                'fade-out-down': 'fade-out-down 0.25s ease-out',
                'fade-in-up': 'fade-in-up 0.25s ease-out',
                'fade-out-up': 'fade-out-up 0.25s ease-out',
                'fade-in-left': 'fade-in-left 0.25s ease-out',
                'fade-out-left': 'fade-out-left 0.25s ease-out',
            }
        }
    },
    variants: {
        extend: {
            ringColor: ['hover', 'active']
        },
        width: ["responsive", "hover", "focus"],
        height: ["responsive", "hover", "focus"],
        scrollbar: ['rounded']
    },
    plugins: [
        require('tailwind-scrollbar')
    ],
}
