const MENUITEMS: IMenuItemProps[] = [
  {
    title: "home",
    type: "link",
    
  },
  {
    title: "hotel",
    type: "sub",
    
  },
  {
    title: "tour",
    type: "sub",
    
  },
  {
    title: "flight",
    type: "sub",
    
  },
  {
    title: "cab",
    type: "sub",
    
  },
  {
    title: "restaurant",
    type: "sub",
   
  },
  {
    title: "pages",
    type: "sub",
    
  },
];

export default MENUITEMS;

export const RightNavMenuItem: IRightNavMenuItem[] = [
  {
    title: "currency",
    type: [
      {
        id: 1,
        currency: "USD",
        name: "USD",
        symbol: "$",
        value: 1,
      },
      {
        id: 2,
        currency: "EUR",
        name: "EUR",
        symbol: "€",
        value: 0.997,
      },
      {
        id: 3,
        currency: "INR",
        name: "INR",
        symbol: "₹",
        value: 79.9,
      },
      {
        id: 4,
        currency: "AUD",
        name: "AUD",
        symbol: "$",
        value: 79.9,
      },
    ],
  },
  {
    title: "language",
    option: [
      { id: 1, lang: "en", language: "ENG" },
      { id: 2, lang: "fr", language: "FRE" },
      { id: 3, lang: "es", language: "SPA" },
      { id: 4, lang: "ar", language: "ARB" },
    ],
  },
  { title: "user" },
  {title:"setting"}
];


export const currencyDropDownData =  {
  title: "currency",
  type: [
    {
      id: 1,
      currency: "USD",
      name: "USD",
      symbol: "$",
      value: 1,
    },
    {
      id: 2,
      currency: "EUR",
      name: "EUR",
      symbol: "€",
      value: 0.997,
    },
    {
      id: 3,
      currency: "INR",
      name: "INR",
      symbol: "₹",
      value: 79.9,
    },
    {
      id: 4,
      currency: "AUD",
      name: "AUD",
      symbol: "$",
      value: 79.9,
    },
  ],
}

export const languageDropDownData = {
  title: "language",
  option: [
    { id: 1, lang: "en", language: "ENG" },
    { id: 2, lang: "fr", language: "FRE" },
    { id: 3, lang: "es", language: "SPA" },
    { id: 4, lang: "ar", language: "ARB" },
  ],
}