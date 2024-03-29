const { colors } = require('tailwindcss/defaultTheme')

module.exports = {
    purge: {
        content: [
            './resources/views/**/*.blade.php',
            './resources/js/components/**/*.vue'
		]
    },
    theme: {
        extend: {
            animation: {
                'spin-slow': 'spin 3s linear infinite',
            },
            zIndex: {
                '1': '1',
            },
            margin: {
                '1.5625': '1.5625rem',
                '1/7': '14.285714%',
            },
            transformOrigin: {
                '1/2': '50% 50%',
            },
            transitionDuration: {
                '250': '250ms',
                '900': '900ms',
            },
            translate: {
                '0.25': '0.0625rem',
                '0.5': '0.125rem',
                '0.75': '0.1875rem',
                '1': '0.25rem',
            },
            spacing: {
                '0.25': '0.0625rem',
                '0.5': '0.125rem',
                '0.75': '0.1875rem',
                '1': '0.25rem',
            },
            rotate: {
                '135': '135deg',
                '-135': '-135deg',
            },
            inset: {
                '0.5625': '0.5625rem',
                '0.625': '0.625rem',
                '1.125': '1.125rem',
                '1.25': '1.25rem',
                '3.75': '3.75rem',
                '1/8': '12.5%',
                '-1/8': '-12.5%',
                '1/4': '25%',
                '-1/4': '-25%',
                '1/5': '20%',
                '-1/5': '-20%',
                '1/6': '16.7%',
                '-1/6': '-16.7%',
                '1/3': '33.33%',
                '-1/3': '-33.33%',
                '1/2': '50%',
                '-1/2': '-50%',
                '2': '0.5rem',
                '-2': '-0.5rem',
                '3': '0.75rem',
                '-3': '-0.75rem',
                '4': '1rem',
                '-4': '-1rem',
                '6': '1.5rem',
                '-6': '-1.5rem',
                '8': '2rem',
                '-8': '-2rem',
                '10': '2.5rem',
                '-10': '-2.5rem',
                '11': '2.75rem',
                '-11': '-2.75rem',
                '12': '3rem',
                '-12': '-3rem',
                '14': '3.5rem',
                '-14': '-3.5rem',
                '16': '4rem',
                '-16': '-4rem',
                '18': '4.5rem',
                '-18': '-4.5rem',
                '32': '8rem',
                '-32': '-8rem',
                '64': '16rem',
                '-64': '-16rem',
                '128': '32rem',
                '-128': '-32rem',
                '256': '64rem',
                '-256': '-64rem',
            },
            height: {
                '1/8': '12.5%',
                '1/4': '25%',
                '3/8': '37.5%',
                'half': '50%',
                '5/8': '62.5%',
                '3/4': '75%',
                '7/8': '87.5%',
                '0.1875': '0.1875rem',
                '1.375': '1.375rem',
                '1.875': '1.875rem',
                '1.75': '1.75rem',
                '7': '1.75rem',
                '8.5': '2.625rem',
                '9': '2.75rem',
                '18': '4.5rem',
                '-18': '-4.5rem',
                '80': '20rem',
                '100': '25rem',
                '120': '30rem',
                '160': '40rem'
            },
            width: {
                '1/8': '12.5%',
                '1/4': '25%',
                '3/8': '37.5%',
                'half': '50%',
                '5/8': '62.5%',
                '3/4': '75%',
                '7/8': '87.5%',
                '1.8125': '1.8125rem',
                '1.875': '1.875rem',
                '7': '1.75rem',
                '8.5': '2.125rem',
                '9': '2.75rem',
                '18': '4.5rem',
                '-18': '-4.5rem',
                '80': '20rem',
                '100': '25rem',
                '120': '30rem',
            },
            minWidth: {
              '0': '0rem',
              '1': '1rem',
              '2': '2rem',
              '3': '3rem',
              '4': '4rem',
              '6': '6rem',
              '8': '8rem',
              '10': '10rem',
              '12': '12rem',
              '14': '14rem',
              '16': '16rem',
              '20': '20rem',
              '24': '24rem',
              '32': '32rem',
              '48': '48rem',
              '64': '64rem',
            },
            minHeight: {
              '0': '0rem',
              '1': '1rem',
              '2': '2rem',
              '3': '3rem',
              '4': '4rem',
              '6': '6rem',
              '8': '8rem',
              '10': '10rem',
              '12': '12rem',
              '14': '14rem',
              '16': '16rem',
              '20': '20rem',
              '24': '24rem',
              '32': '32rem',
              '48': '48rem',
              '64': '64rem',
            },
            maxWidth: {
              '0': '0rem',
              '1': '1rem',
              '2': '2rem',
              '3': '3rem',
              '4': '4rem',
              '6': '6rem',
              '8': '8rem',
              '10': '10rem',
              '12': '12rem',
              '14': '14rem',
              '16': '16rem',
              '20': '20rem',
              '24': '24rem',
              '32': '32rem',
              '48': '48rem',
              '64': '64rem',
            },
            maxHeight: {
              '0': '0rem',
              '1': '1rem',
              '2': '2rem',
              '3': '3rem',
              '4': '4rem',
              '6': '6rem',
              '8': '8rem',
              '10': '10rem',
              '12': '12rem',
              '14': '14rem',
              '16': '16rem',
              '20': '20rem',
              '24': '24rem',
              '32': '32rem',
              '48': '48rem',
              '64': '64rem',
            },
            colors: {
                'gray': {
                    ...colors.gray,
                    '50' : '#f9fafb',
                },
                'viridiant' : {
                    '100' : '#dff7f9',
                    '200' : '#9ee8ec',
                    '300' : '#5dd8df',
                    '400' : '#3cd1d9',
                    '500' : '#27bfc7',
                    '600' : '#219fa6',
                    '700' : '#19787d',
                    '800' : '#105053',
                    '900' : '#08282a'
                },
                'orange-peel' : {
                    '100' : '#fff3e2',
                    '200' : '#ffdba9',
                    '300' : '#ffc370',
                    '400' : '#ffb753',
                    '500' : '#ffab36',
                    '600' : '#ff9f1c',
                    '700' : '#d27b00',
                    '800' : '#8c5200',
                    '900' : '#462900'
                },
                'onyx' : {
                    '100' : '#e6e7e8',
                    '200' : '#b3b8ba',
                    '300' : '#80888c',
                    '400' : '#686f73',
                    '500' : '#51575a',
                    '600' : '#393d3f',
                    '700' : '#2c2f30',
                    '800' : '#1d1f20',
                    '900' : '#0f1010'
                },
                'cultured' : {
                    '100' : '#fefefe',
                    '200' : '#fbfbfb',
                    '300' : '#f9f9f9',
                    '400' : '#f7f7f7',
                    '500' : '#f6f6f6',
                    '600' : '#f5f5f5',
                    '700' : '#b8b8b8',
                    '800' : '#7a7a7a',
                    '900' : '#3d3d3d'
                },
                'linkedin' : '#0077B5',
                'github' : '#211F1F',
                'twitter' : '#08A0E9'
            },
            borderRadius: {
                'xl' : '0.6rem',
                '2xl' : '0.75rem',
                '3xl' : '0.9rem',
                '4xl' : '1rem',
            },
            borderWidth: {
                '0.0625' : '0.0625rem',
                '1' : '1px',
            },
            screens: {
                'xs': '425px',
        },
    },
    variants: {
        borderWidth: ['responsive', 'hover', 'focus'],
        space: ['responsive', 'hover', 'focus', 'active', 'group-hover', 'group-focus'],
        borderColor: ['responsive', 'hover', 'focus', 'active', 'group-hover', 'group-focus'],
        textColor: ['responsive', 'hover', 'focus', 'group-hover'],
    },
    plugins: [],
  }
}
