import DatePicker from 'react-date-picker';


function DatePickerComponent({ setStart, start }){
    console.log(start)

return(
    <DatePicker selected={start} onChange={(date) => setStart(date)} defaultValue={start} />
)
}

export default DatePickerComponent;