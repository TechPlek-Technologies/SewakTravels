import ReactDatePicker from "react-datepicker";
import "react-datepicker/dist/react-datepicker.css";
import { useMediaQuery } from "react-responsive";

const DatePickerComponent = ({startDate,setStartDate,newClass}) => {

  // Calculate tomorrow's date
  const tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1);
  const isMobile = useMediaQuery({ maxWidth: 800 });

  return (
    <ReactDatePicker
      minDate={tomorrow}
      selected={startDate}
      onChange={(date) => {
        setStartDate(new Date(date))}
      }
      id={`datepicker`}
      className={`datepicker-main pickup-date ${newClass? "dateClass":""}`}
      dateFormat="dd MMMM"
      placeholderText="Select Date"
      popperPlacement={isMobile ? 'bottom' : 'left'}
    />
  );
};

export default DatePickerComponent;
