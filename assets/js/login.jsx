import React, { useEffect } from 'react';
import { render } from 'react-dom';
import axios from 'axios';

const Root = () => {
  const formData = new FormData();
  formData.append('email', 'nvdsalehi@gmail.com');
  formData.append('password', '123');
  useEffect(
    () => {
      axios.post('/api/login', formData).then((r) => console.log(r)).catch((e) => console.log(e));
    },
    [],
  );
  return <h1>Automatic Login</h1>;
};

render(<Root />, document.getElementById('root'));
