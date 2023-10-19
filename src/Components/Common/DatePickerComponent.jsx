import ReactDateAndTimePicker from 'react-date-and-time-picker';
import DatePicker from 'react-date-picker';


function DatePickerComponent({ setStart, start }){
    console.log(start)

return(
    <ReactDateAndTimePicker selected={start} onChange={(Date) => setStart(Date)} id="datepicker" className="datepicker-main" dateFormat="dd MMMM" />
    
)
}

export default DatePickerComponent;