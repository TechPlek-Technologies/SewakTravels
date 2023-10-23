import DatePicker from 'react-date-picker';
import 'react-date-picker/dist/DatePicker.css';
import 'react-calendar/dist/Calendar.css';

function DatePickerComponent({ setStart, start }){
    console.log(start)

return(
<DatePicker  value={start} onChange={(date) => setStart(date)} id="datepicker" className="datepicker-main" dateFormat="dd MMMM"  />  
)
}

export default DatePickerComponent;