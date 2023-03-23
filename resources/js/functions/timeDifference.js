import moment, { unix } from 'moment/moment';

export const timeDifference = (START, END) => {
    return moment.duration(moment(unix(END), "HH:mm:ss a").diff(moment(unix(START), "HH:mm:ss a")));
}
