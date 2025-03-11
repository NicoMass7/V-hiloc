import Swal from 'sweetalert2';

export default class Flash extends HTMLElement {
  async connectedCallback() {
    const type = this.getAttribute('type')
    const message = this.getAttribute('message')
    await Swal.fire({
      toast: true,
      possition: "top-center",
      icon: type,
      title: message,
      howCloseButton: true,
      timerProgressBar: true,
      showConfirmButton: false,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      },
      timer: 3000
    });
  }
}

